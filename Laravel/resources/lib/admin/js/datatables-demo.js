// Call the dataTables jQuery plugin
const myTable = document.querySelector("#myTable");
const dataTable = new simpleDatatables.DataTable("#myTable", {
  searchable: true,
  fixedHeight: true,
})