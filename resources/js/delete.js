const handelDelete =(name,id)=>{
    event.preventDefault();
    if (!confirm(`Are you sure you want to delete ${name}`)) {
        const request = new XMLHttpRequest();
        request.open(`delete","/${name}/${id}`);
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                document.getElementById(id).remove();
            }
        }
    }
    request.send();
}
window.handelDelete = handelDelete;