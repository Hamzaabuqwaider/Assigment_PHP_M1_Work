$(function () {
    const taskInput = $('#task');
    const add = $('#add');
    const taskContainer = $('#tasks-container');
    const basUrl = "http://test.test:8080";

    $.ajax({
        type: "GET",
        url: basUrl + "/items",
        success: function (response) {
            response.body.forEach(item => {
                taskContainer.append(`
                <div data-id="${item.id}" class="task w-25 m-auto d-flex justify-content-between align-items-between mb-4 border-bottom p-2 ${item.completed == 1 ? "completed" : ""}">
                    <input type="checkbox" ${item.completed == 1 ? "checked" : ""}>
                    <p class="m-0 d-flex align-items-center">${item.name}</p>
                    <button class="btn btn-danger" type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                `);

                $(`div[data-id="${item.id}"] input`).change(function () {

                    $(this).parent().toggleClass('completed');
                    $.ajax({
                        type: "PUT",
                        url: basUrl + "/items/update",
                        data: JSON.stringify({
                            id: item.id
                        }),
                        dataType: "application/json",
                        success: function (response) {
                            
                        }
                    });
                });

                $(`div[data-id="${item.id}"] button`).click(function () {
                    $.ajax({
                        type: "DELETE",
                        url: basUrl + "/items/delete",
                        data: JSON.stringify({
                            id: item.id
                        }),
                        dataType: "application/json",
                        success: function (response) {

                        }
                    });
                    $(this).parent().hide('slow', function () {
                        $(this).remove();
                    });
                });
            });
        }
    });

    taskInput.focus();

    add.click(function () {
        let task = taskInput.val();

        if (task == "") {
            alert('You need to enter a task to proceed!');
            return;
        }

        // check if the item is already existed in the app. 
        // Get all items
        let tasks = $('.task p');
        // loop through all items
        let taskSwitch = false;
        tasks.each(function () {
            // check if the current item in the loop equals the new item.
            if ($(this).text() == task) {
                alert("Task already exists!");
                taskSwitch = true;
            }
        });

        if (taskSwitch) {
            return;
        }



        $.ajax({
            type: "POST",
            url: basUrl + "/items/create",
            data: JSON.stringify({
                name: task
            }),
            success: function (response) {
                response.body.forEach(item => {
                    taskContainer.append(`
                <div data-id="${item.id}" class="task w-25 m-auto d-flex justify-content-between align-items-between mb-4 border-bottom p-2 ${item.completed == 1 ? "completed" : ""}">
                    <input type="checkbox" ${item.completed == 1 ? "checked" : ""}>
                    <p class="m-0 d-flex align-items-center">${item.name}</p>
                    <button class="btn btn-danger" type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                `);

                    $(`div[data-id="${item.id}"] input`).change(function () {

                        $(this).parent().toggleClass('completed');
                        $.ajax({
                            type: "PUT",
                            url: basUrl + "/items/update",
                            data: JSON.stringify({
                                id: item.id
                            }),
                            dataType: "application/json",
                            success: function (response) {

                            }
                        });
                    });

                    $(`div[data-id="${item.id}"] button`).click(function () {
                        $.ajax({
                            type: "DELETE",
                            url: basUrl + "/items/delete",
                            data: JSON.stringify({
                                id: item.id
                            }),
                            dataType: "application/json",
                            success: function (response) {

                            }
                        });
                        $(this).parent().hide('slow', function () {
                            $(this).remove();
                        });
                    });
                });
            }
        });
    });
});