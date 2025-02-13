<x-app-layout>
<!-- ========== MAIN CONTENT ========== -->
<!-- Breadcrumb -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
  <div class="flex items-center py-2">
    <!-- Navigation Toggle -->
    <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
      <span class="sr-only">Toggle Navigation</span>
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/><path d="m8 9 3 3-3 3"/></svg>
    </button>
    <!-- End Navigation Toggle -->

    <!-- Breadcrumb -->
    <ol class="ms-3 flex items-center whitespace-nowrap">
      <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
        Real Time Chat Application
        <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </li>
      <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
        Dashboard
      </li>
    </ol>
    <!-- End Breadcrumb -->
  </div>
</div>
<!-- End Breadcrumb -->

<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg]
  hs-overlay-open:translate-x-0
  -translate-x-full transition-all duration-300 transform
  w-[260px] h-full
  hidden
  fixed inset-y-0 start-0 z-[60]
  bg-white border-e border-gray-200
  lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
  dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
  <div class="relative flex flex-col h-full max-h-full">
    <div class="px-6 pt-4">
      <!-- Logo -->
      <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="/dashboard" aria-label="Preline">

      </a>
      <!-- End Logo -->
    </div>

    <!-- Content -->
    <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
      <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="flex flex-col space-y-1">
            @foreach ($all_users as $user )
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-800 rounded-lg hover:bg-gray-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white" href="#">
                    <img src="{{ $user->avatar }}" alt="JD" height="30px" width="30px">
                    {{$user->name}}
                </a>
                </li>
            @endforeach

        </ul>
      </nav>
    </div>
    <!-- End Content -->
  </div>
</div>
<!-- End Sidebar -->

<!-- Content -->
{{-- <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
  <!-- your content goes here ... -->
  <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5">
  This is some text within a card body.
</div>
</div> --}}
<!-- End Content -->
<!-- ========== END MAIN CONTENT ========== -->
    @php
        if (auth()->check()) {
            $loggedIn_userId = auth()->user()->id;
            $loggedIn_userName = auth()->user()->name;
        } else {
            $loggedIn_userId = null;
            $loggedIn_userName = null;
        }
    @endphp
    <!-- ========== MAIN CONTENT ========== -->
    <!-- Breadcrumb -->
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden">
        <div class="flex items-center py-2">
            <!-- Navigation Toggle -->
            <button type="button"
                class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
                aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                    <path d="M15 3v18" />
                    <path d="m8 9 3 3-3 3" /></svg>
            </button>
            <!-- End Navigation Toggle -->

            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap">
                <li class="flex items-center text-sm text-gray-800">
                    Real Time Chat Application
                    <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400" width="16" height="16"
                        viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-[260px] h-full
    hidden
    fixed inset-y-0 start-0 z-[60]
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
   " role="dialog" tabindex="-1" aria-label="Sidebar">
        <div class="relative flex flex-col h-full max-h-full">
            <div class="px-6 pt-4">
                <!-- Logo -->
                <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
href="/dashboard" aria-label="Preline">
                    Real Time Chat Application
                </a>
                <!-- End Logo -->
            </div>

            <!-- Content -->
            <div
                class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                    <ul class="flex flex-col space-y-1" id="user-list">
                        @foreach($all_users as $user)
                            <li data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                    href="#">
                                    <img src="{{ $user->avatar }}" alt="" height="50px" width="50px">
                                    {{ $user->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <!-- End Content -->
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        <!-- your content goes here ... -->

        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5">

            <ul class="space-y-5" id="chat-container">

            </ul>
            {{-- here the input and button --}}
            <div class="relative mt-5">
                <div class="flex">
                    <input type="text" id="msg-input"
                        class="peer py-3 px-4 pr-12 block w-full bg-white border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none placeholder-gray-500"
                        placeholder="Enter your message">
                    <button type="button" onclick="sendMessage(currentChannel)"
                        class="peer absolute inset-y-0 right-0 flex items-center justify-center bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 text-white font-semibold py-2 px-3 rounded-r-lg shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send-fill" viewBox="0 0 16 16">
                            <path
d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->

    <script>
        var ably = new Ably.Realtime.Promise({
            key: 'vH0KGQ.wkiQJg:lQ4opBUsOvM9iD9wfFebTETBcPEYX_ywt_LRrUnxGic'
        });

        var recipientId = null;
        var currentChannel = null;
        var recipientName = null;

        ably.connection.on((stateChange) => {
            console.log(stateChange.current);
        });

        var login_userId = '{{ $loggedIn_userId }}';
        var login_userName = '{{ $loggedIn_userName }}';

        if (!login_userId) {
            console.error('User is not authenticated.');
        }

        var UserList = $('#user-list');

        UserList.on('click', 'li', function () {
            recipientId = $(this).attr('data-id');
            recipientName = $(this).attr('data-name');

            UserList.find('li').removeClass('selected-user');

            $(this).addClass('selected-user');

            $.ajax({
                url: '{{ route("check-channel") }}',
                method: 'GET',
                data: {
                    recipientId: recipientId
                },
                success: function (response) {
                    if (response.chanelExits) {
                        var channelName = response.chanelName;

                        subscribeToChannel(channelName);
                    } else {
                        createNewChannel(recipientId);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

        });

        function sendMessage(currentChannel) {
            var messageInput = document.getElementById('msg-input');
            var message = messageInput.value.trim();
            if (!currentChannel) {
                console.error('No active channel is set.');
            }
            if (message === '') {
                console.error('The message is empty.');
            }
            if (message !== '' && currentChannel) {
                // Save message to the database
                $.ajax({
                    url: '{{ route("chat.store") }}',
                    method: 'POST',
                    data: {
                        recipient_id: recipientId,
                        message: message,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            currentChannel.publish(currentChannel.name, {
                                text: message,
                                sender: 'local'
                            });
                            messageInput.value = '';
                        } else {
                            console.error('Failed to save message.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                console.error('No active channel or message is empty.');
            }
        }

        function subscribeToChannel(channelName) {
            if (!channelName) {
                console.error('No channel name provided for subscription.');
                return;
            }

            if (currentChannel) {
                currentChannel.unsubscribe();
            }

            currentChannel = ably.channels.get(channelName);
            if (currentChannel) {
                console.log('Subscribed to channel:', channelName);
            } else {
                console.error('Failed to subscribe to channel:', channelName);
            }

            currentChannel.subscribe(function (message) {
                displayMessage(message, recipientName);
            });

            $('#chat-container').html('');
        }


        function createNewChannel(recipientId) {
            $.ajax({
                url: '{{ route("create-channel") }}',
                method: 'GET',
                data: {
                    recipientId: recipientId
                },
                success: function (response) {
                    if (response.success) {
                        subscribeToChannel(response.chanelName);
                    } else {
                        console.log(response.error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function displayMessage(messageObject, recipientName) {
            var isLocalSender = messageObject.connectionId == ably.connection
                .id;
            const chatContainer = $('#chat-container');
            const message1 = `<li class="max-w-lg flex gap-x-2 sm:gap-x-4 me-11">
            <img class="inline-block size-9 rounded-full" src="https://ui-avatars.com/api/?name=${recipientName}&rounded=true&color=grey" alt="Image Description">
            <!-- Card -->
            <div class="bg-white border border-gray-200 rounded-2xl p-4 space-y-3 dark:bg-neutral-900 dark:border-neutral-700">
              <h2 class="font-medium text-gray-800 dark:text-white">
                  ${messageObject.data.text}
              </h2>
            </div>
            <!-- End Card -->
        </li>`;

            const message2 = `<li class="flex ms-auto gap-x-2 sm:gap-x-4">
            <div class="grow text-end space-y-3">
            <!-- Card -->
            <div class="inline-block bg-blue-600 rounded-2xl p-4 shadow-sm">
                <p class="text-sm text-white">
                ${messageObject.data.text}
                </p>
            </div>
            <!-- End Card -->
            </div>

            <span class="flex-shrink-0 inline-flex items-center justify-center size-[50px] rounded-full">
            <span class="text-sm font-medium text-white leading-none">
              <img src="https://ui-avatars.com/api/?name=${login_userName}&rounded=true&background=random" alt="" height="50px" width="50px">
            </span>
            </span>
        </li>`;
            chatContainer.append(isLocalSender == true ? message2 : message1);
        }

    </script>
</x-app-layout>
