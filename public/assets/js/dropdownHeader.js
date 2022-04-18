const dropdownRecipe = document.querySelectorAll('.dropdownRecipe');
const dropDownDeploy = document.querySelectorAll('.dropDownDeploy');
const spanDropdown = document.querySelectorAll('.spanDropdown');

for (let i = 0; i < dropDownDeploy.length; i++) {
    dropdownRecipe[i].addEventListener('click', () => {
        dropDownDeploy[i].classList.toggle('dropDownDeployDisplayBlock');
        dropDownDeploy[i].classList.toggle('dropDownDeployDisplayNone');
        spanDropdown[i].classList.toggle('spanDropdownArrowDown');


        dropdownRecipe[1].addEventListener('click', () => {
            dropDownDeploy[0].classList.add('dropDownDeployDisplayNone');
            dropDownDeploy[0].classList.remove('dropDownDeployDisplayBlock');
            spanDropdown[0].classList.remove('spanDropdownArrowDown');
        });


        dropdownRecipe[0].addEventListener('click', () => {
            dropDownDeploy[1].classList.add('dropDownDeployDisplayNone');
            dropDownDeploy[1].classList.remove('dropDownDeployDisplayBlock');
            spanDropdown[1].classList.remove('spanDropdownArrowDown');
        });
        
        // if (dropDownDeploy[i].classList.contains('dropDownDeployDisplayBlock') == true) {
        //     setInterval(() => {
        //         window.addEventListener('click', () =>{
        //             dropDownDeploy[i].classList.remove('dropDownDeployDisplayBlock');
        //             dropDownDeploy[i].classList.add('dropDownDeployDisplayNone');
        //             spanDropdown[i].classList.remove('spanDropdownArrowDown');
        //         });
        //     }, 100);
        // }


    });

    window.addEventListener('scroll', () => {
        dropDownDeploy[i].classList.remove('dropDownDeployDisplayBlock');
        dropDownDeploy[i].classList.add('dropDownDeployDisplayNone');
        spanDropdown[i].classList.remove('spanDropdownArrowDown');
    });
    
}




