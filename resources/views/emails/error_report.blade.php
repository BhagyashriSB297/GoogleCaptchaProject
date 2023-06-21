<!DOCTYPE html>
<html>
<head>
    <title>Error Report</title>
</head>
<body>
    <h2>Error Report</h2>
    <p>An error has occurred in the application. Please find the details below:</p>

    <h3>Error Details:</h3>
    <ul>
        <li><strong>Error Message:</strong> {{ $exception->getMessage() }}</li>
        <li><strong>Error Code:</strong> {{ $exception->getCode() }}</li>
        <li><strong>Error File:</strong> {{ $exception->getFile() }}</li>
        <li><strong>Error Line:</strong> {{ $exception->getLine() }}</li>
        <li><strong>Stack Trace:</strong></li>
        <pre>{{ $exception->getTraceAsString() }}</pre>
    </ul>
</body>
</html>
