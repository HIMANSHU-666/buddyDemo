// public/js/status.js
document.addEventListener("DOMContentLoaded", function () {
    const statusButtons = document.querySelectorAll(".status-button");
    const modal = document.getElementById("status-modal");
    const closeModal = document.getElementById("close-modal");
    const updateStatusButton = document.getElementById("update-status");

    statusButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const newStatus = this.getAttribute("data-status");
            openModal(newStatus);
        });
    });

    closeModal.addEventListener("click", function () {
        closeModalModal();
    });

    updateStatusButton.addEventListener("click", function () {
        // Send an AJAX request to update the status
        const newStatus = modal.getAttribute("data-new-status");
        updateStatus(newStatus);
    });

    function openModal(newStatus) {
        modal.setAttribute("data-new-status", newStatus);
        modal.style.display = "block";
    }

    function closeModalModal() {
        modal.style.display = "none";
    }

    function updateStatus(newStatus) {
        axios
            .post("/update-status", { status: newStatus })
            .then((response) => {
                console.log(response.data.message);
                closeModalModal();
            })
            .catch((error) => {
                console.error(error);
            });
    }
});
