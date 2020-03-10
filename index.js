const express = require('express')
const axios = require('axios');
const cors = require('cors');
const app = express()

app.use(cors())

app.get('/postdata', function(req, res){
     axios.get('https://cdn.pinkvilla.com/feed/fashion-section.json')
          .then(function (response) {

               data = response.data;
  
               var mapped = data.map(function (el, i) {
                    return { index: i, value: el.viewCount };
               })
               var sorted_data = mapped.sort(function (a, b) {
                    return b.value - a.value;
               });

               var finaldata = sorted_data.map(function(el, i){
                    return data[sorted_data[i].index]
               })

               res.send(finaldata)
          })
          .catch(function (error) {
               // handle error
                console.log(error);
          });
         
})
app.listen(3000)