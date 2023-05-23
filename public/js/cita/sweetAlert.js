export class SweetAlert {
    constructor(){}

    fnError(titulo, texto){
        Swal.fire({
            icon: 'error',
            title: titulo,
            text: texto
        })
    }

    async fnExito(titulo, texto){
        let result = await Swal.fire({
            icon: 'success',
            title: titulo,
            text: texto
        });

        if (result.isConfirmed === true) {
            location.reload();
        }
    }

    fnInfo(titulo, texto){
        Swal.fire({
            icon: 'info',
            title: titulo,
            text: texto
        });
    }
}
