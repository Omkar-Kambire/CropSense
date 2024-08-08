const selectdr = document.querySelector("#slct")

selectdr.addEventListener("change", () =>{
    getweight();
})

const getweight = () =>{
    // console.log(selectdr.value)   
    switch (selectdr.value) {

        case "none":
            break;

        case "wheat":
            var displaytext = 3.4;
            document.getElementById("dsp").value = displaytext;
            break;

        case "jowar":
            var displaytext = 2;
            document.getElementById("dsp").value = displaytext;
            break;

        case "bajra":
            var displaytext = 0.419;
            document.getElementById("dsp").value = displaytext;
            break;

        case "rice":
            var displaytext = 2.9;
            document.getElementById("dsp").value = displaytext;
            break;

        case "tur":
            var displaytext = 10.5;
            document.getElementById("dsp").value = displaytext;
            break;

        case "moong":
            var displaytext = 3.6;
            document.getElementById("dsp").value = displaytext;
            break;

        case "urad":
            var displaytext = 4;
            document.getElementById("dsp").value = displaytext;
            break;

        case "gram":
            var displaytext = 18;
            document.getElementById("dsp").value = displaytext;
            break;

        case "maize":
            var displaytext = 280;
            document.getElementById("dsp").value = displaytext;
            break;

       
            case "soybean":
                var displaytext = 16.6;
                document.getElementById("dsp").value = displaytext;
                break;

        default:
            document.getElementById("dsp").value = "Invalid Input";
            break;
    }
}

const btn = document.querySelector("#btn")

btn.addEventListener("click", () => {
    calculate();
})
const calculate = () => {
    var avg = document.getElementById("avg").value; //number of heads or pods
    var num_grains = document.getElementById("grns").value;
    var weight_grains = document.getElementById("dsp").value;
    var total = (avg * num_grains * weight_grains) / 10000;
    document.getElementById("display").innerHTML = `<strong>Your yield is : ${total.toFixed(2)} t/ha</strong>`;
    
}