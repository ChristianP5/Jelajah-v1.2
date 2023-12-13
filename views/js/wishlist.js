const addButton = document.querySelectorAll('.add-amm');
const reduceButton = document.querySelectorAll('.reduce-amm');

const addAmm = (event) => {
    // Get Val 
    const boxElement = event.target.parentElement;
    var ammVal = parseInt(boxElement.querySelector('.item-amm').value, 10);
    ammVal += 1;
    boxElement.querySelector('.item-amm').value = ammVal;

    // For Updating the Values
    const itemElement = event.target.parentNode.parentNode.parentNode;
    const perItemPriceElement = itemElement.querySelector('.w-item-price-hidden');
    const totalItemPriceElement = itemElement.querySelector('.item-price-num');

    const perItemPrice = Number(perItemPriceElement.textContent)
    totalItemPriceElement.textContent = perItemPrice * ammVal;

    console.log(perItemPriceElement);
    console.log(totalItemPriceElement);
}

const reduceAmm = (event) => {
    // Get Val 
    const boxElement = event.target.parentElement;
    var ammVal = parseInt(boxElement.querySelector('.item-amm').value, 10);
    ammVal -= 1;
    if(ammVal <= 0){
        ammVal = 0;
    }
    boxElement.querySelector('.item-amm').value = ammVal;


    // For Updating the Values
    const itemElement = event.target.parentNode.parentNode.parentNode;
    const perItemPriceElement = itemElement.querySelector('.w-item-price-hidden');
    const totalItemPriceElement = itemElement.querySelector('.item-price-num');

    const perItemPrice = Number(perItemPriceElement.textContent)
    totalItemPriceElement.textContent = perItemPrice * ammVal;

    console.log(perItemPriceElement);
    console.log(totalItemPriceElement);
}

addButton.forEach( em =>{
    em.addEventListener('click', addAmm);
} )

reduceButton.forEach( em =>{
    em.addEventListener('click', reduceAmm);
} )