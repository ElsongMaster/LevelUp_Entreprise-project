<template>
  <div>
    <div
      class="min-h-screen flex flex-auto flex-shrink-0 antialiased bg-gray-50 w-full text-gray-800"
    >
      <div class="flex flex-col top-0 left-0 w-64 bg-gray-900 screen shadow-lg">
        <div class="flex items-center pl-6 h-20 border-b border-gray-800">
          <!-- <img
            src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t1.0-9/117334168_2606581056324669_4951020710334194218_o.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeFo4bRKc5SfTQvzhwotnTaOfj1P6rO41HF-PU_qs7jUcU1pCerqu3HUsOB0yKyJQwnrgz8Au7GZADcpedo6WgM4&_nc_ohc=DWpkI3p4RSUAX_hKF_Y&_nc_ht=scontent.fmnl13-1.fna&oh=c13c63ee952123b14f0da72b99ccecc8&oe=6087FEC5"
            alt=""
            class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500"
          /> -->
          <div class="ml-1">
            <p
              class="ml-1 text-md font-medium tracking-wide truncate text-gray-100 font-sans"
            >
              JED DYLAN LEE
            </p>
            <div class="badge">
              <span
                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-800 bg-blue-100 rounded-full"
                >User</span
              >
            </div>
          </div>
        </div>
        <div class="overflow-y-auto overflow-x-hidden flex-grow">
          <ul class="flex flex-col py-6 space-y-1">
            <li class="px-5">
              <div class="flex flex-row items-center h-8">
                <div
                  class="flex font-semibold text-sm text-gray-300 my-4 font-sans uppercase"
                >
                  Dashboard
                </div>
              </div>
            </li>
            <li>
              <router-link
                class="router-link"
                :to="{
                  name: 'Profile',
                  params: { slug: 'profile' },
                }"
              >
                <a
                  href="#"
                  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6"
                >
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg
                      class="w-5 h-5"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      ></path>
                    </svg>
                  </span>
                  <span
                    class="ml-2 font-semibold text-sm tracking-wide truncate font-sans"
                    >Profile</span
                  >
                </a>
              </router-link>
            </li>
            <li>
              <router-link
                class="router-link"
                :to="{
                  name: 'ListTask',
                  params: { slug: 'listtask' },
                }"
              >
                <a
                  href="#"
                  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6"
                >
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg
                      class="w-5 h-5"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                      ></path>
                    </svg>
                  </span>
                  <span
                    class="ml-2 font-semibold text-sm tracking-wide truncate font-sans"
                    >Liste des tâches</span
                  >
                </a></router-link
              >
            </li>
            <!-- <li class="px-5">
              <div class="flex flex-row items-center h-8">
                <div
                  class="flex font-semibold text-sm text-gray-300 my-4 font-sans uppercase"
                >
                  Settings
                </div>
              </div>
            </li> -->
            <li>
              <router-link
                class="router-link"
                :to="{
                  name: 'HelpDesk',
                  params: { slug: 'helpdesk' },
                }"
              >
              <a
                href="#"
                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6"
              >
                <span class="inline-flex justify-center items-center ml-4">
                  <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                  </svg>
                </span>
                <span
                  class="ml-2 font-semibold text-sm tracking-wide truncate font-sans"
                  >Help desk</span
                >
              </a>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
      <div class="container">
        <router-view :key="$route.path" />
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Lato");
html {
  font-family: "Lato", sans-serif;
}
</style>
