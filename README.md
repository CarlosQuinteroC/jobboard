# Job Board Platform

This is a simple job booking platform built with **Laravel 12**, **Blade**, and **Tailwind CSS** (via Herd). The project demonstrates full-stack development using Laravel's ORM, basic authentication.

## Features

- **User Roles:**
    - **Posters:** Can create, edit, delete, and view the list of users interested in their job postings.
    - **Viewers:** Can view job listings and mark jobs as “Interested.”
- **Job Posting:**
    - Each job includes a title, description, posted date (automatically generated), and the poster’s information.
    - Job postings are auto-hidden or removed after 2 months.
- **Interest Feature:**
    - Viewers can mark their interest in a job.
    - Posters can view a list of interested users for each job.
- **Landing Page:**
    - Displays all active job postings, sorted by recent postings.
    - Uses pagination to manage a large list of jobs.
- **Validation & Access Control:**
    - Only the poster who created a job can edit or delete it.
    - Basic form validations ensure a smooth user experience.

## Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade templating, Tailwind CSS
- **Database:** MySQL
- **Version Control:** Git (commits pushed to [GitHub](https://github.com/CarlosQuinteroC/jobboard.git))
- **Environment:** Laravel Herd

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/CarlosQuinteroC/jobboard.git
