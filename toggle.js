function toggleTable() {
    var tableDiv = document.getElementById("attendance-table");3
    if (tableDiv.style.visibility === "hidden") {
        tableDiv.style.visibility = "visible";
    } 
    else {
        tableDiv.style.visibility = "hidden";
    }
}