const deleteBtn = document.querySelectorAll(".delete-button");

const editBtn = document.querySelectorAll(".edit-button");

const handleEdit = (id) => async () => {
    try {
        const res = await fetch(window.editEmployeeRoute, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": window.csrfToken,
            },
            body: JSON.stringify({ id }),
        });
        console.log(res);
    } catch (err) {
        console.log(err);
        console.log("Something wen't wrong while trying to edit");
    }
};

editBtn.forEach((btn, i) => btn.addEventListener("click", handleEdit(i + 1)));
