<!DOCTYPE html>
<html>
<head>
    <title>Product Report System</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
</head>
<body>

<h1>Product List</h1>

<!-- Search Form -->
<form id="searchForm">
    <label for="branchSelect">Search by Branch:</label>
    <select id="branchSelect" name="branchSelect">
        <option value="">Select Branch</option>
        <?php foreach ($branches as $branch): ?>
            <option value="<?= $branch['id']; ?>"><?= $branch['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" id="searchButton">Search</button>
</form>

<table id="productTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<!-- Include jQuery -->
<script src="<?= base_url('js/jquery.min.js') ?>"></script>

<!-- Include DataTables -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        var dataTable = $('#productTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('/productList/getProductData') ?>",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.branch_id = $('#branchSelect').val();
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "description" },
                { "data": "price" }
            ]
        });

        // Handle form submission for search
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            dataTable.ajax.reload();
        });
    });
</script>

</body>
</html>


