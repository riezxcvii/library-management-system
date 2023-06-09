<?php
include('navigation-bar.php');
?>

<div class="mb-4 flex justify-center items-center mt-[-1rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[33rem] min-h-screen sm:min-h-[75.5vh]">
        <div class="px-4 py-6 lg:px-8">
            <div class="flex justify-between">
                <h3 class="mb-4 text-xl font-medium text-gray-900">Notifications</h3>
                <a href="" class="text-xs text-blue-600 underline mt-[0.3rem]">Mark all as read</a>
            </div>
            <form class="space-y-6" action="#" autocomplete="off" method="POST">
                <ul>
                    <li>
                        <!--notif for book due-->
                        <div class="bg-blue-100 p-4 text-sm rounded-md mb-1">
                            <h2 class="font-semibold">Log-in</h2>
                            <h3>Rieza Marie Banquillo has a penalty!</h3>
                        </div>
                        <!--notif for book availability-->
                        <div class="bg-blue-100 p-4 text-sm rounded-md mb-1">
                            <h2 class="font-semibold">Pending Registration</h2>
                            <h3>You have a new pending request.</h3>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[-1.5rem]">
    <button onclick="history.back()" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
        Back
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>