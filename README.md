# Doctors-Appointments-API
In our mini appointments system, there will be


> * Users
>   * Basic Laravel Users plus a User Type Id
> * Appointments
>   * Each appointment has:
>       * Start date
>       * End date
>       * Patient
>       * Doctor
>       * Status of the appointment, could be one of the following:
>           * Pending
>           * Completed
>           * Canceled
> * User types
>   * Each user type consists of
>       * Name
>       * Id
>

## Tasks:
>   * Create migrations files for the project requirements as given above
>   * Create RESTful CRUD endpoints for the Appointments Table only
>       * a. The Index action will be able to filter for future appointments and past appointments too
>       * Use translations when showing the status of the appointment
>   * Create Documentation for the API endpoints (Swagger or Postman)
>   * BONUS: use API authentication i.e. (Passport or Sanctum)
>   * BONUS: return the API data with camelCase
>   * BONUS: return the list of translation files as an API endpoint
>
