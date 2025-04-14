# Job Board Platform

This is a simple job booking platform built with **Laravel 12**, **Blade**, and **Tailwind CSS** (via Herd). The project demonstrates full-stack development using Laravel's ORM, basic authentication.
### Improve Opportunities
- Components reusability: There is room for converting some elements in blade components to reduce repeated code.
- For testing purpose would be helpful create the factories and seed of database.
- Modify the layout to replace the current log in and log out buttons for a dropdown with the user name.
- Modify the show view for fixed height if less than 6 jobs in the view.
- Add filters to the jobs view.
- Modify forms for a centered container.
- API documentation, consider [Scramble](https://laravel-news.com/scramble-laravel-api-docs)

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
## Routes
## Route Summary

| Method | URI                          | Name                        | Action                                        | Middleware              |
| ------ | ---------------------------- | --------------------------- | --------------------------------------------- | ----------------------- |
| GET    | `/`                          | `jobs.index`                | `JobController@index`                         | —                       |
| GET    | `/register`                  | `register`                  | `RegisterController@create`                   | —                       |
| POST   | `/register`                  | —                           | `RegisterController@store`                    | —                       |
| GET    | `/login`                     | `login`                     | `SessionController@create`                    | —                       |
| POST   | `/login`                     | —                           | `SessionController@store`                     | —                       |
| POST   | `/logout`                    | —                           | `SessionController@destroy`                   | —                       |
| **Authenticated** |                    |                             |                                               | `auth`                  |
|   GET  | `/jobs/{job}`                | `jobs.show`                 | `JobController@show`                          | `auth`                  |
|   POST | `/jobs/{job}/interest`       | `jobs.interest.toggle`      | `InterestController@toggle`                   | `auth`                  |
| **Posters Only**  |                    |                             |                                               | `auth, role:poster`     |
|   GET  | `/jobs/create`               | `jobs.create`               | `JobController@create`                        | `auth, role:poster`     |
|   POST | `/jobs`                      | `jobs.store`                | `JobController@store`                         | `auth, role:poster`     |
|   GET  | `/jobs/{job}/edit`           | `jobs.edit`                 | `JobController@edit`                          | `auth, role:poster`     |
|   PATCH| `/jobs/{job}`                | `jobs.update`               | `JobController@update`                        | `auth, role:poster`     |
|   DELETE| `/jobs/{job}`               | `jobs.destroy`              | `JobController@destroy`                       | `auth, role:poster`     |

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/CarlosQuinteroC/jobboard.git
