<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Desk</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/landing.css')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwT"
        crossorigin="anonymous">
</head>

<body>

    <nav>
        <a href="#home">Home</a>
        <div class="login-register">
            <a id="login" href="#login">Login</a>
            <a id="register" href="#register">Register</a>
        </div>
    </nav>

    <header>
        <img src="{{asset('img/gem-desk.png')}}" class="card-img-top" alt="gem-desk logo" style="width: 90px; height: auto;">
        <h1>Gem-Desk</h1>
        <p>Your One-Stop Solution for IT Support</p>
    </header>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/gem-desk.png')}}" class="card-img-top custom-card-img" alt="Card 1">
                    <div class="card-body">
                        <h5 class="card-title">Card 1</h5>
                        <p class="card-text custom-card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae maiores fugiat cupiditate obcaecati vitae explicabo cum accusamus veniam in voluptate libero dolorum ullam repellat, laboriosam impedit repudiandae quibusdam quia optio!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/gem-desk.png')}}" class="card-img-top custom-card-img" alt="Card 2">
                    <div class="card-body">
                        <h5 class="card-title">Organization Management</h5>
                        <p class="card-text custom-card-text">This feature facilitates the structured organization and coordination of team hierarchies, workflows, and processes, ensuring seamless operational management within an organization.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/gem-desk.png')}}" class="card-img-top custom-card-img" alt="Card 3">
                    <div class="card-body">
                        <h5 class="card-title">Services Catalog</h5>
                        <p class="card-text custom-card-text">This feature offers a comprehensive catalog of services provided by the organization, allowing users to easily browse, select, and request the services they need.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/gem-desk.png')}}" class="card-img-top custom-card-img" alt="Card 1">
                    <div class="card-body">
                        <h5 class="card-title">Asset Management</h5>
                        <p class="card-text custom-card-text">It provides tools for tracking and managing all organizational assets, including hardware and software resources, ensuring efficient allocation and maintenance.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/gem-desk.png')}}" class="card-img-top custom-card-img" alt="Card 2">
                    <div class="card-body">
                        <h5 class="card-title">Incident Management</h5>
                        <p class="card-text custom-card-text">Focused on swiftly addressing and resolving unexpected issues and incidents, this feature ensures minimal disruption and maintains service continuity</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/gem-desk.png')}}" class="card-img-top custom-card-img" alt="Card 3">
                    <div class="card-body">
                        <h5 class="card-title">Ticket Management</h5>
                        <p class="card-text custom-card-text">A robust system for handling and tracking customer queries and service requests, ensuring every issue is addressed in an organized and timely manner.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section>
                    <h2>Welcome to Our Service Desk</h2>
                    <p>Experience top-notch IT support with our dedicated service desk team. We are here to help you with any
                        technical issues and inquiries you may have.</p>
                    <a href="#contact" class="cta-button">Contact Us</a>
                </section>
            </div>
            
            <div class="col-md-6">
                <section>
                    <h2>Contact Us</h2>
                    <p>Have questions or need assistance? Feel free to reach out to us.</p>
                    <p>Email: support@servicedesk.com</p>
                    <p>Phone: (123) 456-7890</p>
                </section>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Gem-Desk. All rights reserved.</p>
    </footer>
</body>

</html>
