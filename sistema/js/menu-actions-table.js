// DROPDOWN LIST TABLE ACTIONS
const dropdownsActions = document.querySelectorAll(".dropdownlist");

function listActions() {}
dropdownsActions.forEach(dropdownsAction => {
    const selectActions = dropdownsAction.querySelector(".widget_dropdown_list");
    const caretActions = dropdownsAction.querySelector(".caret_list");
    const menuActions = dropdownsAction.querySelector(".menu_dropdown_list");
    const optionsActions = dropdownsAction.querySelectorAll(".menu_dropdown_list li");
    const selectedActions = dropdownsAction.querySelector(".select_list");



    selectActions.addEventListener("click", () => {
        caretActions.classList.toggle("caret_list-rotate");
        menuActions.classList.toggle("menu_classlist_actions");
    });

    optionsActions.forEach(option => {
        option.addEventListener("click", () => {
            selectedActions.innerText = option.innerText;
            caretActions.classList.remove("caret_list-rotate");
            menuActions.classList.remove("menu_classlist_actions");

            optionsActions.forEach(option => {
                option.classList.remove("active_list_dropdown");
            });

            option.classList.add("active_list_dropdown");
        });
    });
});





// ACTIONS CHILDRENS DROPDOWN 
const dropdownChild = document.querySelectorAll('.dropdownlist .menu_dropdown_list');
const actionsChild = document.getElementById('drop_child_actions');

dropdownChild.forEach(cash => {
    const out = cash.parentElement.querySelector('div:first-child');
    out.addEventListener('click', function(source) {
        source.preventDefault();

       if(!this.classList.contains('active')) {
            dropdownChild.forEach(inst=> {
                const aText = inst.parentElement.querySelector('a:first-child');

                aText.classList.remove('active');
                inst.classList.remove('show');
            })
        }


        this.classList.toggle('active');
        cash.classList.toggle('show');
    })
})