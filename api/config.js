const express = require('express');
const routes = express.Router();

const exec = util.promisify(require('child_process').exec);

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

const jsonReader = (filePath, cb) => {
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



 routes.post('/run',(req,res,next)=>{
    
    const cmd = 'ansible-playbook security_group.yml -vvvv  --ask-vault-pass ./pass';
    runCmd(cmd,res);
    
})

module.exports = routes;