<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Manage Incident Request (Administrator)</title>
    </head>
    <body>
        <div class="container mt-2">
            <h1 style="font-weight: bold;">Assign Technicians</h1>

            <div class="mb-2">
                <label for="departmentSelect" class="form-label">Department</label>
                <select class="form-select" aria-label="Default select example" id="departmentSelect">
                    <option selected>Select group or department</option>
                    <option value="1">Networking</option>
                    <option value="2">IT Service</option>
                    <option value="3">Electricity</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="technicianSelect" class="form-label">Technician</label>
                <select class="form-select" aria-label="Default select example" id="technicianSelect">
                    <option selected>Not Assigned </option>
                    <option value="1">Networking</option>
                    <option value="2">IT Service</option>
                    <option value="3">Electricity</option>
                </select>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-primary me-1">Assign</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </div>
        </div>

    </body>
</html>