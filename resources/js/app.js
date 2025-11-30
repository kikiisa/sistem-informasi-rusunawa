import "flowbite";
import { DataTable } from "simple-datatables";
import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import Swal from "sweetalert2";
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("data-table")) {
        const dataTable = new DataTable("#data-table", {
            header: true,
            searchable: true,
            sortable: true,
            perPage: 5,
            perPageSelect: [5, 10, 20, 50],
            firstLast: true,
        });
    }



});
const buttonDelete = document.querySelectorAll(".btn-delete");
buttonDelete.forEach(btn => {
    btn.addEventListener('click', function () {
        const id = this.dataset.id;

        const form = document.getElementById('form-delete-' + id);
    
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data ini tidak bisa dikembalikan setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                // console.log(form)
            }
        });
    });
});


new Editor({
    element: document.querySelector(".element"),
    extensions: [StarterKit],
    content: "<p>Hello World!</p>",
});
