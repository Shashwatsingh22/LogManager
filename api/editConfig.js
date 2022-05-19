const express = require('express');
const routes = express.Router();

const fs = require('fs');

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

const jsonUpdate = (filePath,data,cb) => {
    fs.writeFile(filePath,data,(err)=>{
        if(err) return cb && cb(err);
        try
        {
            console.log("File Updated Successfully!");
            jsonReader('config/keysmap.json',(err,updata)=>{
                if(err) console.log(err);
                else
                {
                    updata = JSON.parse(updata);
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

routes.post('/read',(req,res,next)=> {
    const accessKey = req.body.accessKey;
    console.log(req);
    if(accessKey=="admin12345")
    {
        jsonReader('config/keysmap.json',(err,data)=>{
            if(err) console.log(err);
            else
            {
                data = JSON.parse(data);
                res.status(200).json({
                    message : "Got the Config File Data !",
                    succ : 1,
                    data : data
                })
            }
        })
    }
    else
    {
        res.status(580).json({
            message : "You Are Not Authorized To Access!",
            succ : 0,
            data : "Connect With Admin!"
        })
    }
    
})

routes.post('/update',(req,res,next)=> {
    const accessKey = req.body.accessKey;

    if(accessKey=="admin12345")
    {
        let updata = req.body.newData;
        //updata = JSON.parse(updata);
        updata =  JSON.stringify(updata,null,2);

        jsonUpdate('config/keysmap.json',updata,(err, data)=>{
            if(err) 
            {
                console.log(err);
                res.status(200).json({
                    message : "Some Error Caused!",
                    succ : 0,
                    data : "Connect with Backend Dev"
               })
            }
                else
            {
                //data = JSON.parse(data);
                res.status(200).json({
                    message : "Config File Updated !",
                    succ : 1,
                    data : data
               })
            }
        })
    }


    else
    {
        res.status(580).json({
            message : "You Are Not Authorized To Update It!",
            succ : 0,
            data : "Connect With Admin!"
        })
    }
    
})

module.exports = routes;