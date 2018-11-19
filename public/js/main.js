const gastenboek = document.getElementById('gastenboek');

if(gastenboek){
    gastenboek.addEventListener('click', e => {
        if  (e.target.className === 'btn btn-danger delete-article') {
            if (confirm('Weet je het zeker?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/gastenboek/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}