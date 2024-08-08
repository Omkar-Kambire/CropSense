const searchBtn = document.getElementById("search-btn");
const cityInput = document.getElementById("city");
const weatherContainer = document.querySelector(".weather-container");
const weatherIcon = document.getElementById("weather-icon");
const cityName = document.getElementById("city-name");
const temperature = document.getElementById("temperature");
const conditions = document.getElementById("conditions");
const error = document.getElementById("error");
const winddsp = document.getElementById("wind");
const humiditydsp = document.getElementById("humidity");


searchBtn.addEventListener("click", function (){
    const city = cityInput.value;
    const apikey = "ea2a20fbafe5ab830eb5f55bfd694b2d";
    if (!city) {
        error.innerHTML = "Please enter a city name";
        return;
    }
    error.innerHTML = "";
    weatherContainer.style.display = "none";

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apikey}&units=metric`)
        .then(response => {
            if (!response.ok) {
                throw new Error("City not found");
            }
            return response.json();
        })
        .then(data => {
            console.log(data)
            weatherContainer.style.display = "block"
            weatherIcon.src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`
            cityName.innerHTML = data.name;
            temperature.innerHTML = `<strong>Temperature:</strong> ${data.main.temp} &#8451;`
            conditions.innerHTML = `<strong>Conditions:</strong> ${data.weather[0].description}`
            winddsp.innerHTML = `<strong>Wind:</strong> ${data.wind.speed}m/s`
            humiditydsp.innerHTML = `<strong>Humidity:</strong> ${data.main.humidity} <i class="bi bi-percent"></i>`
        })
        .catch(error => {
            error.innerHTML = error.message;
        })
    });
