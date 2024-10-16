<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PKL</title>

    @vite('resources/css/app.css')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Load jQuery -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <!-- Load Select2 -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
</head>
<body class="px-16">
 



    <section class="pt-16">
        @include('dashboard.components.partials.alert')
        @yield('content')
    </section>
    
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ensure Alpine and its plugins are available before using them
            if (window.Alpine) {
                // Register the persist plugin with Alpine
                Alpine.plugin(AlpinePersist);

                // Start Alpine.js
                Alpine.start();
                
                // Initialize flatpickr
                flatpickr(".datepicker", {
                    mode: "range",
                    static: true,
                    monthSelectorType: "static",
                    dateFormat: "M j, Y",
                    defaultDate: [new Date().setDate(new Date().getDate() - 6), new Date()],
                    prevArrow:
                        '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
                    nextArrow:
                        '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
                    onReady: (selectedDates, dateStr, instance) => {
                        instance.element.value = dateStr.replace("to", "-");
                        const customClass = instance.element.getAttribute("data-class");
                        instance.calendarContainer.classList.add(customClass);
                    },
                    onChange: (selectedDates, dateStr, instance) => {
                        instance.element.value = dateStr.replace("to", "-");
                    },
                });

                flatpickr(".form-datepicker", {
                    mode: "single",
                    static: true,
                    monthSelectorType: "static",
                    dateFormat: "M j, Y",
                    prevArrow:
                        '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
                    nextArrow:
                        '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
                });

                // Call your chart functions
                chart01();
                chart02();
                chart03();
                chart04();
                map01();
            } else {
                console.error('Alpine.js is not loaded');
            }
        });
    </script>
@yield('customJs')
</body>
</html>