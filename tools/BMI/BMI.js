console.log('set 02');
document.getElementById('Check').onclick = function(){
var height = document.getElementById('height').value;
// console.log('height',height);
var weight = document.getElementById('weight').value;
// console.log('weight',weight);
    let bmii = (weight/(height * height))*10000;
    let bmi = Math.round(bmii);
    console.log('your BMI',bmi);
    document.getElementById('boxi').style.display = 'block';
    box.innerHTML = bmi;
    
};