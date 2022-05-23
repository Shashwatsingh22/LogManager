const express = require('express')
const app = express()
//For Parssing the body
const bodyParser =require('body-parser');
//for log management we need this lib
const morgan=require('morgan');

//Routes
const logview = require('./api/logview');
const editConfig = require('./api/editConfig');


app.use(morgan('dev'));

app.use(bodyParser.urlencoded({extended:true}));
app.use(bodyParser.json());
//Resolving Cors Error 
app.use((req,res,next)=>{
    //Here, we set the Header Mannually
    res.header('Access-Control-Allow-Origin','*') //Here, We can specify the Specific endpoint
    res.header('Access-Control-Allow-Headers','Origin,X-Requested-With,Content-Type,Accept,Authorixation');

    if(req.method==='OPTIONS')
    {
        res.header('Access-Control-Allow-Methods','PUT,POST,PATCH,DELETE,GET');
        return res.status(200).json({});
    }
    next();
})

app.use('/accesslog',logview);

app.use('/editConfig',editConfig);

app.use((req,res,next)=>{
    res.status(200).json({
        message : "Server Started Working!"
    });
});



module.exports = app;