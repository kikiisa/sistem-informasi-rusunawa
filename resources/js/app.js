import "flowbite";
import { DataTable } from "simple-datatables";
import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";

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

new Editor({
    element: document.querySelector(".element"),
    extensions: [StarterKit],
    content: "<p>Hello World!</p>",
});
