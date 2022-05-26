const express = require('express');
const routes = express.Router();
const util = require('util')
const exec = util.promisify(require('child_process').exec);
const yaml = require('js-yaml')

const fs = require('fs');

async function runCmd(cmd,res)
{
    try{
        const run = await exec(cmd);
        
        res.status(200).json({
            output : run['stdout'],
        })
    }
    catch(err){
        console.log(err);
    }
}

const fileReader = (filePath, cb) => {
    fs.readFile(filePath , 'utf-8',(err,fileData)=> {
        if(err) {
            return cb && cb(err);
        }
        try {
            return cb && cb(null, fileData);
        }
        catch (err)
        {
          console.log(err);
          return cb && cb(err);
        }
    })
 }

 const fileUpdate = (filePath,data,cb) => {
    fs.writeFile(filePath,data,(err)=>{
        if(err) return cb && cb(err);
        try
        {
            console.log("File Updated Successfully!");
            fileReader(filePath,(err,updata)=>{
                if(err) console.log(err);
                else
                {
                    updata = yaml.load(updata);
                    return cb && cb(null,updata);
                }
            })
            
        }
        catch(err) 
        {
            console.log(err);
            return cb && cb(null);
        }
    })
}


 routes.post('/getConfigVar',(req,res,next)=>{
    
      fileReader('main.yml',(err,data)=>{
        if(err) console.log(err);
        else
        {
            data = yaml.load(data);
            res.status(200).json({
                data : data
            })
        }
    })

    //const cmd = 'ansible-playbook security_group.yml -vvvv  --ask-vault-pass ./pass';
    //runCmd(cmd,res)
})

routes.post('/update',(req,res,next)=>{
       
    fileReader('main.yml',(err,data)=>{
        if(err) console.log(err);
        else
        {
            data = yaml.load(data);
            data['rule_list'][0]['cidr_ip']=req.body.cidr_ip;
            data = yaml.dump(data);
            
            fileUpdate('main.yml',data,(err,updata)=>{
                if(err) console.log(err);
                else
                {
                    console.log(updata);
                    res.status(200).json({
                        'data': updata
                    })
                }
            });
            
        }
    })

       
})



module.exports = routes;