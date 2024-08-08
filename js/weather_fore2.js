const city = document.querySelector("#city");
const forecast = document.querySelector("#forecast")
const apikey_geolocation = "d9d45bf479a74435bd46aac727193da3";
const api_key = "b1b15e88fa797225412429c1c50c122a1";
const btn = document.querySelector("#search-btn");

const desc1 = document.getElementById("desc1");
const wind1 = document.getElementById("wind1");
const humidity1 = document.getElementById("humidity1");
const temperature1 = document.getElementById("temperature1");
const icon1 = document.getElementById("icon");


const desc2 = document.getElementById("desc2");
const wind2 = document.getElementById("wind2");
const humidity2 = document.getElementById("humidity2");
const temperature2 = document.getElementById("temperature2");
const icon2 = document.getElementById("icon2");

const desc3 = document.getElementById("desc3");
const wind3 = document.getElementById("wind3");
const humidity3 = document.getElementById("humidity3");
const temperature3 = document.getElementById("temperature3");
const icon3 = document.getElementById("icon3");

const desc4 = document.getElementById("desc4");
const wind4 = document.getElementById("wind4");
const humidity4 = document.getElementById("humidity4");
const temperature4 = document.getElementById("temperature4");
const icon4 = document.getElementById("icon4");

const desc5 = document.getElementById("desc5");
const wind5 = document.getElementById("wind5");
const humidity5 = document.getElementById("humidity5");
const temperature5 = document.getElementById("temperature5");
const icon5 = document.getElementById("icon5");

// const getweek = (value) => {
//     const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
//     const d = new Date(value);
//     console.log( weekday[d.getDay(value)]);
//     // document.getElementById("demo").innerHTML = day;
// }



function convertion(val) {
    return val.toFixed(2);
}

function convert(value) {
    return (value - 273.15).toFixed(2);
}
btn.addEventListener("click", function () {
    

    fetch(
        `https://api.geoapify.com/v1/geocode/search?text=${city.value}&apiKey=${apikey_geolocation}`
    )
        .then((response) => response.json())
        .then((data) => {
            var lon = convertion(data["features"][0]["properties"]["lon"]);
            var lat = convertion(data["features"][0]["properties"]["lat"]);
            console.log(lon)
            console.log(lat)
            fetch(
                `https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=${lat}&lon=${lon}&appid=${api_key}`
            ).then((res) => res.json())
                .then((result) => {
                    console.log(result)

                    // for today
                    // getweek(result.list[4].dt_txt);
                    temperature1.innerHTML = `<strong>Temperature : </strong>${convert(result.list[4].main.temp)} &#8451;`
                    desc1.innerHTML = `<strong>Conditions : </strong>${result.list[4].weather[0].description}`
                    wind1.innerHTML = `<strong>Wind : </strong>${result.list[4].wind.speed}m/s`
                    humidity1.innerHTML = `<strong>Humidity : </strong>${result.list[4].main.humidity} <i class="bi bi-percent"></i>`
                    icon1.src = `https://openweathermap.org/img/wn/${result.list[4].weather[0].icon}@2x.png`
                    // 
                    // for Day 2

                    temperature2.innerHTML = `<strong>Temperature : </strong>${convert(result.list[28].main.temp)} &#8451;`
                    desc2.innerHTML = `<strong>Conditions : </strong>${result.list[28].weather[0].description}`
                    wind2.innerHTML = `<strong>Wind : </strong>${result.list[28].wind.speed}m/s`
                    humidity2.innerHTML = `<strong>Humidity : </strong>${result.list[28].main.humidity} <i class="bi bi-percent"></i>`
                    icon2.src = `https://openweathermap.org/img/wn/${result.list[28].weather[0].icon}@2x.png`

                    // for Day 3 

                    temperature3.innerHTML = `<strong>Temperature : </strong>${convert(result.list[52].main.temp)} &#8451;`
                    desc3.innerHTML = `<strong>Conditions : </strong>${result.list[52].weather[0].description}`
                    wind3.innerHTML = `<strong>Wind : </strong>${result.list[52].wind.speed}m/s`
                    humidity3.innerHTML = `<strong>Humidity : </strong>${result.list[52].main.humidity} <i class="bi bi-percent"></i>`
                    icon3.src = `https://openweathermap.org/img/wn/${result.list[52].weather[0].icon}@2x.png`



                    // for Day 4 

                    temperature4.innerHTML = `<strong>Temperature : </strong>${convert(result.list[76].main.temp)} &#8451;`
                    desc4.innerHTML = `<strong>Conditions : </strong>${result.list[76].weather[0].description}`
                    wind4.innerHTML = `<strong>Wind : </strong>${result.list[76].wind.speed}m/s`
                    humidity4.innerHTML = `<strong>Humidity : </strong>${result.list[76].main.humidity} <i class="bi bi-percent"></i>`
                    icon4.src = `https://openweathermap.org/img/wn/${result.list[76].weather[0].icon}@2x.png`


                    // for Day 5

                    temperature5.innerHTML = `<strong>Temperature : </strong>${convert(result.list[95].main.temp)} &#8451;`
                    desc5.innerHTML = `<strong>Conditions : </strong>${result.list[95].weather[0].description}`
                    wind5.innerHTML = `<strong>Wind : </strong>${result.list[95].wind.speed}m/s`
                    humidity5.innerHTML = `<strong>Humidity : </strong>${result.list[95].main.humidity} <i class="bi bi-percent"></i>`
                    icon5.src = `https://openweathermap.org/img/wn/${result.list[95].weather[0].icon}@2x.png`

                    // console.log(result)
                })
        })
        .catch((err) => console.log(err));
       
});