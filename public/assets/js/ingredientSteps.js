const steps = document.getElementById('steps');
const ingredients = document.getElementById('ingredients');
const buttonIngredients = document.querySelector('.buttonIngredients');
const buttonSteps = document.querySelector('.buttonSteps');

buttonIngredients.addEventListener('click', () => {
    steps.classList.add('displayNone');
    ingredients.classList.remove('displayNone');
    buttonIngredients.classList.add('active');
    buttonSteps.classList.remove('active');
});

buttonSteps.addEventListener('click', () => {
    steps.classList.remove('displayNone');
    ingredients.classList.add('displayNone');
    buttonIngredients.classList.remove('active');
    buttonSteps.classList.add('active');
});
