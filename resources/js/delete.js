const handelDelete = (event, name,button) => {
    event.preventDefault();
    console.log(name);
    // let DeleteButton = document.getElementById(`delete`);
    let form = button.form;
    console.log(form);
    let url = form.getAttribute('action');
    let token = form.querySelector('input[name="_token"]').value;
    // return confirm(`Are you sure you want to delete this?`);
    if ( confirm(`Are you sure you want to delete this?`)) {
        const request = new XMLHttpRequest();
        request.open('DELETE', url);
        request.setRequestHeader('X-CSRF-TOKEN', token);
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                button.parentElement.parentElement.parentElement.parentElement.remove();
            }else {
                console.log("Request failed or not yet completed");
            }
        };
        request.send();
    }
};
window.handelDelete = handelDelete;