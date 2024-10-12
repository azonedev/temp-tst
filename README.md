## Documentation

### Description
Designed and developed a COVID vaccine registration system using Laravel and Blade, based on specified requirements. Containerized the application for streamlined deployment and scalability. The system allows users to register for vaccination, select vaccine centers, and receive automated email notifications. Scheduling is handled dynamically, considering daily limits for each center, and ensures first-come, first-served order while avoiding weekends.

### Note
For this setup we keep our .env file on git to simplified project installation process, if you want to deploy anywhere please adjust credentials.

## Prerequisites
- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- Ubuntu or MacOs (Our install.sh file is supported for those os)

## Setup
1. Clone the repository:
    ```sh
    git clone https://github.com/azonedev/temp-tst.git
    ```
2. Navigate to the project directory:
    ```sh
    cd [project directory]
    ```
3. Run the installation script:
    ```sh
    sudo chmod +x install
    sudo ./install
    ```
4. Verify that your container is all of the container is up and running with `docker-compose ps`
   
## Live Ports
- Application: `http://localhost:8885`

For database database, redis check the root `.env` file

## Technical Docs

