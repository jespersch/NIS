$(document).ready(function () {

    $('.orderButton').click(function () {
        // Retrieve the material ID from the data-material-id attribute
        var materialId = $(this).data('material-id');

        // You can now use the materialId as needed (e.g., update modal content)
        // For example, update the modal title with the material ID
        $('#orderModalLabel').text('Order Material ID: ' + materialId);
    });

    // Add a click event for the confirmOrderButton
    $('.confirmOrderButton').click(function () {
        $('#orderModal').modal('hide');
    });
});
