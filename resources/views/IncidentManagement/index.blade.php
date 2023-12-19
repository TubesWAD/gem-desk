@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>Incident Records<br>
        </h2>
    </div>

    <div class="mt-2">
        <button type="button" class="btn btn-primary">Add Incident</button>
        <button type="button" class="btn btn-secondary">Delete</button>
    </div>

    <div class="mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Insiden</th>
                    <th>Service</th>
                    <th>Probabilitas</th>
                    <th>Dampak</th>
                    <th>Kuadran Risiko</th>
                    <th>Tingkat Risiko</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                    <td>Data 3</td>
                    <td>Data 4</td>
                    <td>Data 5</td>
                    <td>Data 6</td>
                    <td>Data 7</td>
                    <td>Data 8</td>
                    <td>Data 9</td>
                </tr>

                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                    <td>Data 3</td>
                    <td>Data 4</td>
                    <td>Data 5</td>
                    <td>Data 6</td>
                    <td>Data 7</td>
                    <td>Data 8</td>
                    <td>Data 9</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
@endsection

