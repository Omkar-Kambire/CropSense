const city = document.querySelector("#city");
const forecast = document.querySelector("#forecast")
const apikey_geolocation = "d9d45bf479a74435bd46aac727193da3";
const api_key = "b1b15e88fa797225412429c1c50c122a1";
const btn = document.querySelector("#search-btn");


const getweek = (value) => {
    const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const day = new Date(value);
    return (weekday[day.getDay(value)]);
    // console.log(weekday[day.getDay(value)]);
}



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
            // console.log(lon)
            // console.log(lat)
            fetch(
                `https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=${lat}&lon=${lon}&appid=${api_key}`
            ).then((res) => res.json())
                .then((result) => {
                    // console.log(result)

                    // for today
                    document.getElementById("weekday1").innerHTML = getweek(result.list[4].dt_txt);
                    document.getElementById("temperature1").innerHTML = `<strong>Temperature : </strong>${convert(result.list[4].main.temp)} &#8451;`
                    document.getElementById("desc1").innerHTML = `<strong>Conditions : </strong>${result.list[4].weather[0].description}`
                    document.getElementById("wind1").innerHTML = `<strong>Wind : </strong>${result.list[4].wind.speed}m/s`
                    document.getElementById("humidity1").innerHTML = `<strong>Humidity : </strong>${result.list[4].main.humidity} <i class="bi bi-percent"></i>`
                    document.getElementById("icon").src = `https://openweathermap.org/img/wn/${result.list[4].weather[0].icon}@2x.png`


                    // for Day 2
                    document.getElementById("weekday2").innerHTML = getweek(result.list[28].dt_txt);
                    document.getElementById("temperature2").innerHTML = `<strong>Temperature : </strong>${convert(result.list[28].main.temp)} &#8451;`
                    document.getElementById("desc2").innerHTML = `<strong>Conditions : </strong>${result.list[28].weather[0].description}`
                    document.getElementById("wind2").innerHTML = `<strong>Wind : </strong>${result.list[28].wind.speed}m/s`
                    document.getElementById("humidity2").innerHTML = `<strong>Humidity : </strong>${result.list[28].main.humidity} <i class="bi bi-percent"></i>`
                    document.getElementById("icon2").src = `https://openweathermap.org/img/wn/${result.list[28].weather[0].icon}@2x.png`

                    // for Day 3 
                    document.getElementById("weekday3").innerHTML = getweek(result.list[52].dt_txt);
                    document.getElementById("temperature3").innerHTML = `<strong>Temperature : </strong>${convert(result.list[52].main.temp)} &#8451;`
                    document.getElementById("desc3").innerHTML = `<strong>Conditions : </strong>${result.list[52].weather[0].description}`
                    document.getElementById("wind3").innerHTML = `<strong>Wind : </strong>${result.list[52].wind.speed}m/s`
                    document.getElementById("humidity3").innerHTML = `<strong>Humidity : </strong>${result.list[52].main.humidity} <i class="bi bi-percent"></i>`
                    document.getElementById("icon3").src = `https://openweathermap.org/img/wn/${result.list[52].weather[0].icon}@2x.png`



                    // for Day 4 
                    document.getElementById("weekday4").innerHTML = getweek(result.list[76].dt_txt);
                    document.getElementById("temperature4").innerHTML = `<strong>Temperature : </strong>${convert(result.list[76].main.temp)} &#8451;`
                    document.getElementById("desc4").innerHTML = `<strong>Conditions : </strong>${result.list[76].weather[0].description}`
                    document.getElementById("wind4").innerHTML = `<strong>Wind : </strong>${result.list[76].wind.speed}m/s`
                    document.getElementById("humidity4").innerHTML = `<strong>Humidity : </strong>${result.list[76].main.humidity} <i class="bi bi-percent"></i>`
                    document.getElementById("icon4").src = `https://openweathermap.org/img/wn/${result.list[76].weather[0].icon}@2x.png`


                    // for Day 5
                    document.getElementById("weekday5").innerHTML = getweek(result.list[95].dt_txt);
                    document.getElementById("temperature5").innerHTML = `<strong>Temperature : </strong>${convert(result.list[95].main.temp)} &#8451;`
                    document.getElementById("desc5").innerHTML = `<strong>Conditions : </strong>${result.list[95].weather[0].description}`
                    document.getElementById("wind5").innerHTML = `<strong>Wind : </strong>${result.list[95].wind.speed}m/s`
                    document.getElementById("humidity5").innerHTML = `<strong>Humidity : </strong>${result.list[95].main.humidity} <i class="bi bi-percent"></i>`
                    document.getElementById("icon5").src = `https://openweathermap.org/img/wn/${result.list[95].weather[0].icon}@2x.png`

                    // console.log(result)
                })
        })
        .catch((err) => console.log(err));

});