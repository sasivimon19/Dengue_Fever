var axios = require('axios');
var data = JSON.stringify({"functionName": "sendDataPAD", "Title": "041", "FirstName": "ประเสริฐ",
    "LastName": "ม้าเชี่ยว", "Address": "100/100 ว่องวานิช", "AmphorCode": "00*01", "ProvinceCode": "00",
    "PostCode": "10300", "IDCard": "2990502369211", "Birthday": "1993-03-09",
    "Mobile": "0999999999", "Occp": "0100", "Ben": "ทายาทตามกฎหมาย"});

var config = {
    method: 'post',
    url: 'https://cors-anywhere.herokuapp.com/https://https://ws.jpinsurancefriend.com/webservice/uat/service.php? JINR-BR=12345678',
    headers: {
        'Authorization': 'Bearer jp-YjgxNmMyMTM5N2Y2YTQwMTM0ZjU1ODU3NWNiMzRkMTMxMWIwZTk3NDQ2YmE5OTgxYzA3NWQ3NGQyYmIxNGFkYzMyMzAzMjMwMzAzODMzMzEzMTMwMzMzMDMyMzg=',
        'Content-Type': 'application/json'
    },
    data: data
};

axios(config)
        .then(function (response) {
            console.log(JSON.stringify(response.data));
        })
        .catch(function (error) {
            console.log(error);
});