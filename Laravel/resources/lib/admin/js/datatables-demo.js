// Call the dataTables jQuery plugin
const myTable = document.querySelector("#myTable");
new simpleDatatables.DataTable("#myTableMostPopularSubjects", {
  searchable: true,
  fixedHeight: true,
})

new simpleDatatables.DataTable("#myTableMostActiveUsersSinceCreation")