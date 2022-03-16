function openModalForm (id, title, category, description) {
    const modal = new bootstrap.Modal(document.getElementById('modalEdit'));
    modal.show();

    const titleEdit = document.getElementById('titleEdit');
    const categoryEdit = document.getElementById('categoryEdit');
    const descriptionEdit = document.getElementById('descriptionEdit');
    const inputHidden = document.getElementById('inputHidden');

    const formatType = type => {
        const types = ['Impressora', 'Hardware', 'Software', 'Rede'];
        return types.indexOf(type);
    }

    titleEdit.value = title;
    categoryEdit.value = formatType(category);
    descriptionEdit.value = description;
    inputHidden.value = id;
}


const applyModalThemes = param => {
    const modalTitle = document.querySelector('#modalFeedback .modal-title');
    const modalContent = document.querySelector('#modalFeedback .modal-body p');
    const modalBtn = document.querySelector('#modalFeedback .btn');

    if (param === 'deleted') {
        modalTitle.innerHTML = 'Chamado deletado'
        modalContent.innerHTML = 'Chamado deletado com sucesso'
        modalTitle.classList.add('text-danger')
        modalBtn.classList.add('btn-danger')
    }

    if (param === 'edited') {
        modalTitle.innerHTML = 'Chamado editado'
        modalContent.innerHTML = 'Chamado editado com sucesso'
        modalTitle.classList.add('text-success')
        modalBtn.classList.add('btn-success')
    }

    if (param === 'success') {
        modalTitle.innerHTML = 'Chamado cadastrado'
        modalContent.innerHTML = 'Chamado cadastrado com sucesso'
        modalTitle.classList.add('text-success')
        modalBtn.classList.add('btn-success')
    }
}

const modalFeedback = () => {
    const modal = new bootstrap.Modal(document.getElementById('modalFeedback'));
    const path = location.href.split('?')
    const currentPath = path[1]

    if (currentPath !== undefined) {
        applyModalThemes(currentPath)
        modal.show() 
    }
    
}

modalFeedback()


