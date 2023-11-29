function confirmDeleteProduct(id) {
  Swal.fire({
    title: "Are you sure to delete?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href = "?controller=product&action=delete&id=" + id;
    }
  });
}
function confirmRemoveItemCart(id) {
  Swal.fire({
    title: "Are you sure to remove this product?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href = "?controller=cart&action=removeFromCart&id=" + id;
    }
  });
}
function confirmOrder(id) {
  Swal.fire({
    title: "Are you sure to confirm order?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href = "?controller=order&action=confirm&order_id=" + id;
    }
  });
}
function cancelOrder(id) {
  Swal.fire({
    title: "Are you sure to cancel order?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href = "?controller=order&action=cancel&order_id=" + id;
    }
  });
}

function confirmOrderGuest(id) {
  Swal.fire({
    title: "Are you sure to confirm order?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href =
        "?controller=orderguest&action=confirm&order_id=" + id;
    }
  });
}
function cancelOrderGuest(id) {
  Swal.fire({
    title: "Are you sure to cancel order?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href =
        "?controller=orderguest&action=cancel&order_id=" + id;
    }
  });
}
function confirmDeleteCategory(id) {
  Swal.fire({
    title: "Are you sure to delete?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete action with the product ID
      window.location.href = "?controller=category&action=delete&id=" + id;
    }
  });
}

// Function to show a success message
function showSuccessMessage(message) {
  Swal.fire({
    title: "Success!",
    text: message,
    icon: "success",
    timer: 2000, // The message will auto-close after 2 seconds
  });
}
function showConfirmation(message, callback) {
  Swal.fire({
    title: "Confirmation",
    text: message,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#20aee3",
    confirmButtonText: "Yes",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      // If the user confirms, execute the callback function
      callback();
    }
  });
}
