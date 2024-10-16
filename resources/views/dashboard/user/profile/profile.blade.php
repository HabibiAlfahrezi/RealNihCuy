@extends('dashboard.layouts.base')
@section('content')

<div class="flex flex-col min-h-screen ">

  <main class="container mx-auto p-4 ">


        <!-- ====== Profile Section Start -->
      <div
        class="overflow-hidden rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="relative z-20 h-35 md:h-65">
          <img src="{{ asset('storage/'. $profile->background) }}" alt="profile cover" class="h-full w-full rounded-tl-sm rounded-tr-sm object-cover bg-cover bg-center object-center" />
          <div class="absolute bottom-1 right-1 z-10 xsm:bottom-4 xsm:right-4" >
            <form action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="cover" class="flex cursor-pointer items-center justify-center gap-2 rounded bg-primary px-2 py-1 text-sm font-medium text-white hover:bg-opacity-80 xsm:px-4" >
                <input type="file"
                  name="background" id="cover" class="sr-only" onchange="this.form.submit()"/>
                <span>
                  <svg class="fill-current" width="14" height="14"viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" ><path fill-rule="evenodd" clip-rule="evenodd" d="M4.76464 1.42638C4.87283 1.2641 5.05496 1.16663 5.25 1.16663H8.75C8.94504 1.16663 9.12717 1.2641 9.23536 1.42638L10.2289 2.91663H12.25C12.7141 2.91663 13.1592 3.101 13.4874 3.42919C13.8156 3.75738 14 4.2025 14 4.66663V11.0833C14 11.5474 13.8156 11.9925 13.4874 12.3207C13.1592 12.6489 12.7141 12.8333 12.25 12.8333H1.75C1.28587 12.8333 0.840752 12.6489 0.512563 12.3207C0.184375 11.9925 0 11.5474 0 11.0833V4.66663C0 4.2025 0.184374 3.75738 0.512563 3.42919C0.840752 3.101 1.28587 2.91663 1.75 2.91663H3.77114L4.76464 1.42638ZM5.56219 2.33329L4.5687 3.82353C4.46051 3.98582 4.27837 4.08329 4.08333 4.08329H1.75C1.59529 4.08329 1.44692 4.14475 1.33752 4.25415C1.22812 4.36354 1.16667 4.51192 1.16667 4.66663V11.0833C1.16667 11.238 1.22812 11.3864 1.33752 11.4958C1.44692 11.6052 1.59529 11.6666 1.75 11.6666H12.25C12.4047 11.6666 12.5531 11.6052 12.6625 11.4958C12.7719 11.3864 12.8333 11.238 12.8333 11.0833V4.66663C12.8333 4.51192 12.7719 4.36354 12.6625 4.25415C12.5531 4.14475 12.4047 4.08329 12.25 4.08329H9.91667C9.72163 4.08329 9.53949 3.98582 9.4313 3.82353L8.43781 2.33329H5.56219Z" fill="white" /><path fill-rule="evenodd" clip-rule="evenodd" d="M6.99992 5.83329C6.03342 5.83329 5.24992 6.61679 5.24992 7.58329C5.24992 8.54979 6.03342 9.33329 6.99992 9.33329C7.96642 9.33329 8.74992 8.54979 8.74992 7.58329C8.74992 6.61679 7.96642 5.83329 6.99992 5.83329ZM4.08325 7.58329C4.08325 5.97246 5.38909 4.66663 6.99992 4.66663C8.61075 4.66663 9.91659 5.97246 9.91659 7.58329C9.91659 9.19412 8.61075 10.5 6.99992 10.5C5.38909 10.5 4.08325 9.19412 4.08325 7.58329Z" fill="white"  /> </svg> 
                </span> 
                <span>Edit</span> 
              </label>
            </form>
          </div>
        </div>
        <div class="px-4 pb-6 text-center lg:pb-8 xl:pb-11.5">
          <div class="relative z-30 mx-auto -mt-22 h-30 w-full max-w-30 rounded-full bg-white/20 p-1 backdrop-blur sm:h-44 sm:max-w-44 sm:p-3" >
          <div class="relative drop-shadow-2">
            <img src="{{ asset('storage/' . $profile->image ) }}" alt="profile" class="h-full w-full rounded-full"/>
            <label for="profile" class="absolute bottom-0 right-0 flex h-8.5 w-8.5 cursor-pointer items-center justify-center rounded-full bg-primary text-white hover:bg-opacity-90 sm:bottom-2 sm:right-2" >
              <svg class="fill-current" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.76464 1.42638C4.87283 1.2641 5.05496 1.16663 5.25 1.16663H8.75C8.94504 1.16663 9.12717 1.2641 9.23536 1.42638L10.2289 2.91663H12.25C12.7141 2.91663 13.1592 3.101 13.4874 3.42919C13.8156 3.75738 14 4.2025 14 4.66663V11.0833C14 11.5474 13.8156 11.9925 13.4874 12.3207C13.1592 12.6489 12.7141 12.8333 12.25 12.8333H1.75C1.28587 12.8333 0.840752 12.6489 0.512563 12.3207C0.184375 11.9925 0 11.5474 0 11.0833V4.66663C0 4.2025 0.184374 3.75738 0.512563 3.42919C0.840752 3.101 1.28587 2.91663 1.75 2.91663H3.77114L4.76464 1.42638ZM5.56219 2.33329L4.5687 3.82353C4.46051 3.98582 4.27837 4.08329 4.08333 4.08329H1.75C1.59529 4.08329 1.44692 4.14475 1.33752 4.25415C1.22812 4.36354 1.16667 4.51192 1.16667 4.66663V11.0833C1.16667 11.238 1.22812 11.3864 1.33752 11.4958C1.44692 11.6052 1.59529 11.6666 1.75 11.6666H12.25C12.4047 11.6666 12.5531 11.6052 12.6625 11.4958C12.7719 11.3864 12.8333 11.238 12.8333 11.0833V4.66663C12.8333 4.51192 12.7719 4.36354 12.6625 4.25415C12.5531 4.14475 12.4047 4.08329 12.25 4.08329H9.91667C9.72163 4.08329 9.53949 3.98582 9.4313 3.82353L8.43781 2.33329H5.56219Z" fill="" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.00004 5.83329C6.03354 5.83329 5.25004 6.61679 5.25004 7.58329C5.25004 8.54979 6.03354 9.33329 7.00004 9.33329C7.96654 9.33329 8.75004 8.54979 8.75004 7.58329C8.75004 6.61679 7.96654 5.83329 7.00004 5.83329ZM4.08337 7.58329C4.08337 5.97246 5.38921 4.66663 7.00004 4.66663C8.61087 4.66663 9.91671 5.97246 9.91671 7.58329C9.91671 9.19412 8.61087 10.5 7.00004 10.5C5.38921 10.5 4.08337 9.19412 4.08337 7.58329Z" fill="" />
              </svg>
              <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" onchange="this.form.submit()" id="profile" class="sr-only" />
              </form>
            </label>
          </div>
        </div>
          <div class="mt-4">
            <h3 class="mb-1.5 text-2xl font-medium text-black dark:text-white">
              {{ $profile->name }}
            </h3>
            <p class="font-medium">{{ $profile->current_job ?? 'Website Developer' }}</p>
            <div class="mx-auto mb-5.5 mt-4.5 grid max-w-94 grid-cols-2 rounded-md border border-stroke py-2.5 shadow-1 dark:border-strokedark dark:bg-[#37404F]" >
              {{-- <div class="flex flex-col items-center justify-center gap-1 border-r border-stroke px-4 dark:border-strokedark xsm:flex-row">
                <span class="font-semibold text-black dark:text-white"
                  >259</span>
                <span class="text-sm">Posts</span>
              </div> --}}
              <div class="flex flex-col items-center justify-center gap-1 border-r border-stroke px-4 dark:border-strokedark xsm:flex-row">
                <span class="font-semibold text-black dark:text-white"
                  >{{ $follow->followers_count   }}</span>
                <span class="text-sm">Followers</span>
              </div>
              <div class="flex flex-col items-center justify-center gap-1 px-4 xsm:flex-row">
                <span class="font-semibold text-black dark:text-white"
                  >{{ $follow->following_count }}</span><span class="text-sm">Following</span>
              </div>
            </div>

            <div class="mx-auto max-w-180 mt-5">
              <h4 class="font-medium text-black dark:text-white">
                About Me
              </h4>
              <p class="mt-2 text-sm font-normal">
                {{ $profile->description }}
              </p>
            </div>

            <div class="mt-6.5">
              <h4 class="mb-3.5 font-medium text-black dark:text-white">
                Follow me on
              </h4>
              <div class="flex items-center justify-center gap-3.5">
                <a href="https://facebook.com/{{ $profile->userSocial->facebook ?? '' }}" class="hover:text-primary" name="social-icon" aria-label="social-icon">
                  <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" >
                    <g clip-path="url(#clip0_30_966)">
                      <path d="M12.8333 12.375H15.125L16.0416 8.70838H12.8333V6.87504C12.8333 5.93088 12.8333 5.04171 14.6666 5.04171H16.0416V1.96171C15.7428 1.92229 14.6144 1.83337 13.4227 1.83337C10.934 1.83337 9.16663 3.35229 9.16663 6.14171V8.70838H6.41663V12.375H9.16663V20.1667H12.8333V12.375Z"fill="" />
                    </g>
                    <defs>
                      <clipPath id="clip0_30_966">
                        <rect width="22" height="22" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </a>
                <a href="https://twitter.com/{{ $profile->userSocial->twitter ?? '' }}" class="hover:text-primary" name="social-icon" aria-label="social-icon">
                  <svg class="fill-current" width="23"  height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_30_970)">
                      <path
                        d="M20.9813 5.18472C20.2815 5.49427 19.5393 5.69757 18.7795 5.78789C19.5804 5.30887 20.1798 4.55498 20.4661 3.66672C19.7145 4.11405 18.8904 4.42755 18.0315 4.59714C17.4545 3.97984 16.6898 3.57044 15.8562 3.43259C15.0225 3.29474 14.1667 3.43617 13.4218 3.83489C12.6768 4.2336 12.0845 4.86726 11.7368 5.63736C11.3891 6.40746 11.3056 7.27085 11.4993 8.0933C9.97497 8.0169 8.48376 7.62078 7.12247 6.93066C5.76118 6.24054 4.56024 5.27185 3.59762 4.08747C3.25689 4.67272 3.07783 5.33801 3.07879 6.01522C3.07879 7.34439 3.75529 8.51864 4.78379 9.20614C4.17513 9.18697 3.57987 9.0226 3.04762 8.72672V8.77439C3.04781 9.65961 3.35413 10.5175 3.91465 11.2027C4.47517 11.8878 5.2554 12.3581 6.12304 12.5336C5.55802 12.6868 4.96557 12.7093 4.39054 12.5996C4.63517 13.3616 5.11196 14.028 5.75417 14.5055C6.39637 14.983 7.17182 15.2477 7.97196 15.2626C7.17673 15.8871 6.2662 16.3488 5.29243 16.6212C4.31866 16.8936 3.30074 16.9714 2.29688 16.8502C4.04926 17.9772 6.08921 18.5755 8.17271 18.5735C15.2246 18.5735 19.081 12.7316 19.081 7.66522C19.081 7.50022 19.0765 7.33339 19.0691 7.17022C19.8197 6.62771 20.4676 5.95566 20.9822 5.18564L20.9813 5.18472Z"
                        fill=""/>
                    </g>
                    <defs>
                      <clipPath id="clip0_30_970">
                        <rect width="22" height="22" fill="white" transform="translate(0.666138)"/>
                      </clipPath>
                    </defs>
                  </svg>
                </a>
                <a href="https://linkedin.com/{{ $profile->userSocial->linkedin ?? '' }}" class="hover:text-primary" name="social-icon" aria-label="social-icon" >
                  <svg class="fill-current" width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg" >
                    <g clip-path="url(#clip0_30_974)">
                      <path d="M6.69548 4.58327C6.69523 5.0695 6.50185 5.53572 6.15786 5.87937C5.81387 6.22301 5.34746 6.41593 4.86123 6.41569C4.375 6.41545 3.90878 6.22206 3.56513 5.87807C3.22149 5.53408 3.02857 5.06767 3.02881 4.58144C3.02905 4.09521 3.22244 3.62899 3.56643 3.28535C3.91042 2.9417 4.37683 2.74878 4.86306 2.74902C5.34929 2.74927 5.81551 2.94265 6.15915 3.28664C6.5028 3.63063 6.69572 4.09704 6.69548 4.58327ZM6.75048 7.77327H3.08381V19.2499H6.75048V7.77327ZM12.5438 7.77327H8.89548V19.2499H12.5071V13.2274C12.5071 9.87244 16.8796 9.56077 16.8796 13.2274V19.2499H20.5005V11.9808C20.5005 6.32494 14.0288 6.53577 12.5071 9.31327L12.5438 7.77327Z" fill=""/>
                    </g>
                    <defs>
                      <clipPath id="clip0_30_974">
                        <rect width="22" height="22" fill="white" transform="translate(0.333862)"/>
                      </clipPath>
                    </defs>
                  </svg>
                </a>
                <a href="https://{{ $profile->userSocial->facebook ?? '' }}.com" class="hover:text-primary" name="social-icon" aria-label="social-icon"
                >
                  <svg class="fill-current" width="22" height="22"  viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_30_978)">
                      <path d="M18.3233 10.6077C18.2481 9.1648 17.7463 7.77668 16.8814 6.61929C16.6178 6.90312 16.3361 7.16951 16.038 7.41679C15.1222 8.17748 14.0988 8.79838 13.0011 9.25929C13.1542 9.58013 13.2945 9.89088 13.4182 10.1842V10.187C13.4531 10.2689 13.4867 10.3514 13.519 10.4345C14.9069 10.2786 16.3699 10.3355 17.788 10.527C17.9768 10.5527 18.1546 10.5802 18.3233 10.6077ZM9.72038 3.77854C10.6137 5.03728 11.4375 6.34396 12.188 7.69271C13.3091 7.25088 14.2359 6.69354 14.982 6.07296C15.2411 5.8595 15.4849 5.62824 15.7117 5.38088C14.3926 4.27145 12.7237 3.66426 11 3.66671C10.5711 3.66641 10.1429 3.70353 9.72038 3.77762V3.77854ZM3.89862 9.16396C4.52308 9.1482 5.1468 9.11059 5.76863 9.05121C7.27163 8.91677 8.7618 8.66484 10.2255 8.29771C9.46051 6.96874 8.63463 5.67578 7.75046 4.42296C6.80603 4.89082 5.97328 5.55633 5.30868 6.37435C4.64409 7.19236 4.16319 8.14374 3.89862 9.16396ZM5.30113 15.6155C5.65679 15.0957 6.12429 14.5109 6.74488 13.8747C8.07771 12.5089 9.65071 11.4455 11.4712 10.8589L11.528 10.8424C11.3768 10.5087 11.2347 10.2108 11.0917 9.93029C9.40871 10.4207 7.63588 10.7269 5.86946 10.8855C5.00779 10.9634 4.23504 10.9973 3.66671 11.0028C3.66509 12.6827 4.24264 14.3117 5.30204 15.6155H5.30113ZM13.7546 17.7971C13.4011 16.0144 12.9008 14.2641 12.2586 12.5639C10.4235 13.2303 8.96138 14.2047 7.83113 15.367C7.375 15.8276 6.97021 16.3362 6.62388 16.8841C7.88778 17.8272 9.42308 18.3356 11 18.3334C11.9441 18.3347 12.8795 18.1533 13.7546 17.799V17.7971ZM15.4715 16.8117C16.9027 15.7115 17.8777 14.1219 18.2096 12.3475C17.898 12.2696 17.5029 12.1917 17.0684 12.1312C16.1023 11.9921 15.1221 11.9819 14.1534 12.101C14.6988 13.6399 15.1392 15.2141 15.4715 16.8126V16.8117ZM11 20.1667C5.93729 20.1667 1.83337 16.0628 1.83337 11C1.83337 5.93729 5.93729 1.83337 11 1.83337C16.0628 1.83337 20.1667 5.93729 20.1667 11C20.1667 16.0628 16.0628 20.1667 11 20.1667Z" fill=""
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_30_978">
                        <rect width="22" height="22" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </a>
                <a href="https://github.com/{{ $profile->userSocial->github ?? '' }}" class="hover:text-primary"  name="social-icon" aria-label="social-icon" >
                  <svg class="fill-current" width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_30_982)">
                      <path
                        d="M11.6662 1.83337C6.6016 1.83337 2.49951 5.93546 2.49951 11C2.49847 12.9244 3.10343 14.8002 4.22854 16.3613C5.35366 17.9225 6.94181 19.0897 8.76768 19.6974C9.22602 19.7771 9.39743 19.5021 9.39743 19.261C9.39743 19.0438 9.38552 18.3224 9.38552 17.5542C7.08285 17.9786 6.48701 16.9932 6.30368 16.4771C6.2001 16.2131 5.75368 15.4 5.3641 15.1819C5.04326 15.0105 4.58493 14.586 5.35218 14.575C6.07451 14.5631 6.58968 15.2396 6.76201 15.5146C7.58701 16.9006 8.90518 16.511 9.43135 16.2709C9.51202 15.675 9.75218 15.2745 10.0162 15.0453C7.9766 14.8161 5.84535 14.025 5.84535 10.5188C5.84535 9.52146 6.2001 8.69737 6.78493 8.05479C6.69326 7.82562 6.37243 6.88604 6.8766 5.62562C6.8766 5.62562 7.64385 5.38546 9.39743 6.56612C10.1437 6.35901 10.9147 6.25477 11.6891 6.25629C12.4683 6.25629 13.2474 6.35896 13.9808 6.56521C15.7334 5.37354 16.5016 5.62654 16.5016 5.62654C17.0058 6.88696 16.6849 7.82654 16.5933 8.05571C17.1772 8.69737 17.5329 9.51046 17.5329 10.5188C17.5329 14.037 15.3906 14.8161 13.351 15.0453C13.6829 15.3313 13.9698 15.8813 13.9698 16.7411C13.9698 17.9667 13.9579 18.9521 13.9579 19.262C13.9579 19.5021 14.1302 19.7881 14.5885 19.6965C16.4081 19.0821 17.9893 17.9126 19.1094 16.3526C20.2296 14.7926 20.8323 12.9206 20.8329 11C20.8329 5.93546 16.7308 1.83337 11.6662 1.83337Z"
                        fill=""
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_30_982">
                        <rect width="22" height="22" fill="white" transform="translate(0.666138)" />
                      </clipPath>
                    </defs>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ====== Profile Section End -->

    
   




    <div class="flex flex-col lg:flex-row gap-6 mt-12">

      <!-- Left Section -->
      <div class="w-full lg:w-2/3">
        
        

       

        <!-- Personal Information Section -->
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-2xl font-semibold text-gray-900 ">All Personal Information</h3>
        </div>
        <p class="leading-normal text-md text-dark border-b border-borderAbu pb-7"> {{ $profile->description }}</p>
        <div class="space-y-8 md:pt-7 ">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-borderAbu">
            <!-- Email -->
            <div class="flex flex-col md:flex-row md:items-center items-start border border-borderAbu md:border-none p-2">
              <div class="bg-gray-100 p-3 rounded-full md:flex-shrink-0">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="md:ml-4 mt-2 md:mt-0">
                <p class="font-semibold">{{ $profile->userSocial->email ?? 'No Email' }}</p>
                <p class="text-gray-500 text-sm">Mail Address</p>
              </div>
            </div>
        
            <!-- Phone Number -->
            <div class="flex flex-col md:flex-row md:items-center items-start border border-borderAbu md:border-none p-2">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-phone"></i>
              </div>
              <div class="md:ml-4 mt-2 md:mt-0">
                <p class="font-semibold">{{ $profile->userSocial->phone ?? 'No Phone Number' }}</p>
                <p class="text-gray-500 text-sm">Phone Number</p>
              </div>
            </div>
        
            <!-- Birthday -->
            <div class="flex flex-col md:flex-row md:items-center items-start border border-borderAbu md:border-none p-2">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-birthday-cake"></i>
              </div>
              <div class="md:ml-4 mt-2 md:mt-0">
                <p class="font-semibold">{{ $profile->birth_date ?? 'No Birth Date' }}</p>
                <p class="text-gray-500 text-sm">18 Years Old</p>
              </div>
            </div>
        
            <!-- Salary -->
            <div class="flex flex-col md:flex-row md:items-center items-start border border-borderAbu md:border-none p-2">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fa-solid fa-money-bill"></i>
              </div>
              <div class="md:ml-4 mt-2 md:mt-0">
                <p class="font-semibold">{{ $profile->expected_salary ?? 'No Expected Salary' }}</p>
                <p class="text-gray-500 text-sm">Expected Salary</p>
              </div>
            </div>
        
            <!-- Location -->
            <div class="flex flex-col md:flex-row md:items-center items-start border border-borderAbu md:border-none p-2">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="md:ml-4 mt-2 md:mt-0">
                <p class="font-semibold">{{ $profile->address ?? 'No Location' }}</p>
                <p class="text-gray-500 text-sm">Location</p>
              </div>
            </div>
        
            <!-- Work Type -->
            <div class="flex flex-col md:flex-row md:items-center items-start border border-borderAbu md:border-none p-2">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-briefcase"></i>
              </div>
              <div class="md:ml-4 mt-2 md:mt-0">
                <p class="font-semibold">{{ $profile->work_type ?? 'No Work Type' }}</p>
                <p class="text-gray-500 text-sm">Work Type</p>
              </div>
            </div>
          </div>
        </div>
        

        <!-- Resume Section -->
        <div class="flex justify-between items-center">
          <h3 class="text-2xl font-semibold text-gray-900 mt-6 mb-4">Resume</h3>
          <div class="flex space-x-2">
            <button @click="$dispatch('open-modal', 'document')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
            </button>
          </div>
        </div>
        <div class="flex justify-between items-center border-b border-borderAbu pb-4 mb-4">
          <div class="flex items-center">
            <!-- Tambahkan bg untuk ikon PDF -->
            <div class="bg-gray-100 rounded-full p-3">
              <i class="fas fa-file-pdf "></i> 
            </div>
            <p class="text-gray-700 ml-3">
              {{ $profile->userDocument->first()?->document ? $profile->name : 'No Resume' }}
            </p>
          </div>
          <a href="{{ asset('storage/' . ($profile->userDocument->first()->document ?? '')) }}" 
            type="button" 
            class="bg-primary hover:bg-red-300 transition duration-300 ease-in-out text-white font-bold py-2 px-2 rounded flex items-center">
           <!-- Tambahkan bg untuk ikon download -->
           <div class="rounded-full p-1 mr-2">
             <i class="fas fa-download"></i> 
           </div>
           Download
         </a>
         
        </div>
        

        <div class="flex justify-between items-center mb-6">
          <h3 class="text-2xl font-semibold text-gray-900 ">All Experiences</h3>
          <div class="flex space-x-2">
            <button @click="$dispatch('open-modal', 'experience')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
            </button>
          </div>
        </div>
        <div class="space-y-7">
          <!-- Experience Item -->
          @foreach ($profile->userExperience as $experience)
            <div class="md:flex items-start md:space-x-4 border-b border-borderAbu pb-7">
              <div class="flex md:flex-none items-start justify-between">
                <img src="{{ asset('storage/'. $experience->image) }}" alt="Company Logo" class="w-16 h-16 rounded-full mb-4 md:mb-0" />
                <a href="{{ route('experience.delete', $experience->id) }}"  class="border border-borderAbu block md:hidden rounded-lg p-1 hover:border-primary transition-colors">
                  <img src="{{ asset('image/icon/delete.png') }}" class="w-6 h-6" alt="Add">
                </a>
              </div>
              <div class="flex-grow">
                <div class="flex justify-between items-center">
                  <div class="flex items-center space-x-3">
                    <h4 class="font-bold text-gray-800 text-lg">{{ $experience->company }}</h4>
                    <p class="text-gray-600 py-0.5 px-1 bg-gray-100">{{ $experience->type }}</p>
                  </div>
                  <a href="{{ route('experience.delete', $experience->id) }}"  class="border hidden md:block border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                    <img src="{{ asset('image/icon/delete.png') }}" class="w-6 h-6" alt="Add">
                  </a>
                  
                  
                </div>
                <div class="flex items-center space-x-2 ">
                  <p class="text-gray-600 ">
                    {{ $experience->title }} &#8226; <!-- Unicode character for a bullet point -->
                  </p>
                  <p class="text-gray-500">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                </div>
                <div>
                  <p class="text-gray-500 mt-3">{{ $experience->description }}</p>
                </div>
              </div>
            </div>
          @endforeach
          <!-- Add more experience items here... -->
        </div>


        <!-- Education Section -->
        <div class="flex justify-between items-center my-6">
          <h3 class="text-2xl font-semibold text-gray-900 ">All Education</h3>
          <div class="flex space-x-2">
            <button @click="$dispatch('open-modal', 'education')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
            </button>
          </div>
        </div>
        <div class="space-y-7">
          @foreach ($profile->userEducation as $education)
          <div class="md:flex items-start md:space-x-4 border-b border-borderAbu pb-7">
            <div class="flex md:flex-none items-start justify-between">
              <img src="{{ asset('storage/'. $education->image) }}" alt="Company Logo" class="w-16 h-16 rounded-full mb-4 md:mb-0" />
              <a href="{{ route('education.delete', $education->id) }}"  class="border border-borderAbu block md:hidden rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset('image/icon/delete.png') }}" class="w-6 h-6" alt="Add">
              </a>
            </div>
            <div class="flex-grow">
              <div class="flex justify-between items-center">
                <h4 class="font-bold text-gray-800 text-lg">{{ $education->title }}</h4>
                <a href="{{ route('education.delete', $education->id) }}"  class="border hidden md:block border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                  <img src="{{ asset('image/icon/delete.png') }}" class="w-6 h-6" alt="Add">
                </a>
              </div>
              <div>
                <p class="text-gray-500 mb-2">{{ $education->description }}</p>
                <p class="text-gray-500">{{ $education->start_date }}
              </div>
            </div>
          </div>
        @endforeach

          <!-- Add more education items here... -->
        </div>

        {{-- Skill --}}
        <div class="border-b border-borderAbu pb-8">
          <h3 class="text-2xl font-semibold text-gray-900 mt-6 mb-4">Skills</h3>
          <div class="flex flex-wrap gap-6">
            @foreach ($profile->userSkill as $skill)
              <div class="px-4 py-2 border border-borderAbu rounded-md">
                <p>{{ $skill->title }}</p>
              </div>
            @endforeach
          </div>
        </div>
        
      </div>

      <!-- Right Section -->
      <div class="w-full lg:w-1/3 md:px-10">
        <!-- Active Positions Section -->
        <div class="mb-8">
          <div class="flex justify-between items-center   mb-4">
            <h3 class="text-2xl font-semibold text-gray-900">Social Media</h3>
            <button @click="$dispatch('open-modal', 'social-media')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
            </button>
          </div>
          @if ($profile->userSocial)
            <div class="space-y-4">
              <!-- Instagram -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-instagram text-pink-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">Instagram</p>
                  <a href="https://instagram.com/{{ $profile->userSocial->instagram }}" class="text-blue-500 text-sm underline">instagram.com/{{ $profile->userSocial->instagram }}</a>
                </div>
              </div>
              <!-- GitHub -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-github text-gray-800 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">GitHub</p>
                  <a href="https://github.com/{{ $profile->userSocial->github }}" target="_blank" class="text-blue-500 text-sm underline">github.com/{{ $profile->userSocial->github }}</a>
                </div>
              </div>
              <!-- Twitter (X) -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-x-twitter text-blue-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">Twitter (X)</p>
                  <a href="https://twitter.com/{{ $profile->userSocial->twitter }}" class="text-blue-500 text-sm underline">twitter.com/{{ $profile->userSocial->twitter }}</a>
                </div>
              </div>
              <!-- Facebook -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-facebook text-blue-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">Facebook</p>
                  <a href="https://facebook.com/{{ $profile->userSocial->facebook }}" class="text-blue-500 text-sm underline">facebook.com/{{ $profile->userSocial->facebook }}</a>
                </div>
              </div>
              <!-- Twitter (X) -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-linkedin text-blue-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">LinkedIn</p>
                  <a href="https://linkedin.com/{{ $profile->userSocial->linkedin }}" class="text-blue-500 text-sm underline">linkedin.com/{{ $profile->userSocial->linkedin }}</a>
                </div>
              </div>
            </div>
          @endif
        </div>


        <h3 class="text-xl font-bold text-gray-900 mb-4">Active Positions</h3>
        <div class="space-y-6">
          <!-- Active Position Item -->
          @foreach ($applicants as  $applicant)
          <div class="border-b border-borderAbu pb-4">
            <img src="{{ asset('storage/'. $applicant->company->logo)  }}" alt="Company Logo" class="rounded-full w-14 h-14 mb-4 mr-4" />
            <div class="flex items-center">
              <div class="flex-grow">
                <h4 class="font-bold text-gray-800">{{ $applicant->pekerjaan->title }}</h4>
                <p class="text-gray-600">{{ $applicant->company->name }}</p>
              </div>
              <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded capitalize">
                <i class="fas fa-calendar-alt"></i> {{ $applicant->stage }}
              </button>
            </div>
          </div>
          @endforeach

        </div>

        <!-- Career Status Section -->
        <h3 class="text-xl font-bold text-gray-900 mt-6 mb-4">Career Status</h3>
        <form action="{{ route('role.store') }}" method="POST">
          @csrf
          <select name="role" onchange="this.form.submit()" class="border border-borderAbu px-4 py-2 rounded text-gray-700 w-full">
              <option {{ old('role', $profile->role == 'actively-seeking-job' ? 'selected' : '') }} value="actively-seeking-job" selected>Actively Seeking Job</option>
              <option {{ old('role', $profile->role == 'open-to-offers' ? 'selected' : '') }} value="open-to-offers">Open to Offers</option>
              <option {{ old('role', $profile->role == 'not-actively-seeking' ? 'selected' : '') }} value="not-actively-seeking">Not Actively Seeking</option>
          </select>
        </form>

      </div>

      
    </div>

    <div class="flex-none w-full max-w-full mt-6">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-xl font-bold text-gray-900">Project</h3>
          <div class="flex space-x-2">
            <button @click="$dispatch('open-modal', 'project')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
            </button>
          </div>
        </div>
        <div class="flex-auto ">
          <div class="flex flex-wrap gap-6">
            @foreach ($profile->userProject as $project)
            <div class="w-full max-w-full md:mb-6 md:w-6/12 md:flex-none xl:mb-8 xl:w-3/12 border border-borderAbu shadow-lg py-4 px-6 rounded-lg bg-white"> {{-- Tambahkan background untuk memastikan border terlihat jelas --}}
              <div class="relative flex flex-col h-full bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <div class="relative flex-shrink-0 h-40"> {{-- Tinggi tetap pada container gambar --}}
                  <a class="block shadow-lg rounded-2xl h-full"> {{-- Pastikan tautan mengambil seluruh tinggi container --}}
                    <img src="{{ asset('storage/' . $project->image) }}" alt="" class="w-full h-full object-cover  rounded-2xl" />
                  </a>
                </div>
                <div class="flex flex-col flex-auto pt-3">
                  <a href="javascript:;">
                    <h5 class="text-lg font-bold">{{ $project->title }}</h5>
                  </a>
                  <p class="mb-6 leading-normal text-sm">{{ Str::limit($project->description, 50) }}</p>
                  <div class="flex items-center justify-between mt-auto">
                    <a href="{{ $project->link }}" target="_blank" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Project</a>
                    <a href="{{ route('project.delete', $project->id) }}" class="border group flex items-center justify-center border-borderAbu rounded-lg p-1 hover:border-primary transition-colors w-10 h-10">
                      <i class="fa-solid fa-trash text-md text-center group-hover:text-primary"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          

          
          </div>
        </div>
      </div>
    </div>
  </main>

</div>
@endsection



{{-- Background --}}
<x-mainModal id="background">
  <div x-data class="px-6 py-4 max-w-lg mx-auto bg-white shadow-lg rounded-lg">
    <x-slot name="header">
      <h2 class="text-lg font-semibold text-gray-900">Add Background</h2>
    </x-slot>
    <div>
      <form action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image Field -->
        <div class="mb-4">
          <label for="background" class="block text-sm font-medium text-gray-700">Background</label>
          <input type="file" name="background" id="background" accept="image/*" class="mt-1 block w-full text-sm text-gray-500
              file:bg-indigo-50 file:text-indigo-700
              file:py-2 file:px-4 file:rounded-full
              file:border-0 file:font-semibold
              hover:file:bg-indigo-100">
        </div>

        <x-slot name="footer">
          <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
              Cancel
          </button>
          <button type="submit" form="documentForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
              Add Background
          </button>
        </x-slot>
      </form>
    </div>
  </div>
</x-mainModal>

{{-- Document --}}
<x-mainModal id="document">
  <div x-data class="py-4 max-w-lg  bg-white shadow-lg rounded-lg">
    <x-slot name="header">
      <h2 class="text-lg font-semibold text-gray-900">Post a Document</h2>
    </x-slot>
    <div>
      <form action="{{ route('document.store') }}" id="documentForm" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image Field -->
        <div class="mb-4">
          <label for="document" class="block text-sm font-medium text-gray-700">Document</label>
          <input type="file" name="document" id="document" class="mt-1 block w-full text-sm text-gray-500
              file:bg-indigo-50 file:text-indigo-700
              file:py-2 file:px-4 file:rounded-full
              file:border-0 file:font-semibold
              hover:file:bg-indigo-100">
        </div>

        <x-slot name="footer">
          <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
              Cancel
          </button>
          <button type="submit" form="documentForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
              Add Document
          </button>
        </x-slot>
      </form>
    </div>
  </div>
</x-mainModal>

{{-- Social Media --}}
<x-mainModal id="social-media">
  <div x-data class=" py-4">
    <x-slot name="header">
      <h2 class="text-lg font-semibold text-gray-900">Update Your Social Media</h2>
    </x-slot>

      <div class="mt-4">
        <form action="{{ route('sosmed.store') }}" id="socialMediaForm" method="POST">
          @csrf
          <div class="space-y-4">
            <!-- Instagram Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 3A2.5 2.5 0 003 5.5v13A2.5 2.5 0 005.5 21h13A2.5 2.5 0 0021 18.5v-13A2.5 2.5 0 0018.5 3h-13zM12 7a5 5 0 100 10 5 5 0 000-10zm4.5 1a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 01.75-.75h2.5z" />
                </svg>
              </span>
              <input type="text" name="instagram" value="{{ $profile->userSocial->instagram ?? '' }}" id="instagram" placeholder="Instagram" class="w-full px-3 py-2 border-gray-300 rounded-md focus:border focus:border-primary sm:text-sm">
            </div>
        
            <!-- GitHub Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 7.48 2 12c0 4.42 3.13 8.13 7.38 9.44.54.1.74-.23.74-.51v-1.84c-3.02.66-3.65-1.46-3.65-1.46-.49-1.26-1.2-1.6-1.2-1.6-.98-.67.08-.66.08-.66 1.08.08 1.65 1.11 1.65 1.11.95 1.67 2.48 1.19 3.09.91.09-.69.37-1.19.67-1.46-2.34-.27-4.81-1.17-4.81-5.21 0-1.15.41-2.09 1.08-2.83-.11-.27-.47-1.39.1-2.89 0 0 .88-.28 2.88 1.08a10.04 10.04 0 012.62-.35c.89 0 1.78.12 2.62.35 2-1.36 2.88-1.08 2.88-1.08.57 1.5.21 2.62.1 2.89.67.74 1.08 1.68 1.08 2.83 0 4.05-2.49 4.94-4.84 5.2.38.34.73 1.01.73 2.03v3.02c0 .28.2.62.74.51C20.87 20.13 24 16.42 24 12c0-4.52-4.48-9-12-9z" />
                </svg>
              </span>
              <input type="text" name="github" value="{{ $profile->userSocial->github ?? '' }}" id="github" placeholder="GitHub" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <!-- Facebook Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 9.64a.99.99 0 00-.88-.63h-2.71v-.68c0-.35.2-.6.54-.6h2.17a.99.99 0 00.88-.63.99.99 0 00-.88-1.37h-2.17a2.65 2.65 0 00-2.66 2.65v.68H11c-.55 0-1 .45-1 1s.45 1 1 1h1.71v8c0 .55.45 1 1 1s1-.45 1-1v-8h2.71a.99.99 0 00.88-.63c.09-.31.03-.64-.17-.9l-2.25-3.4a.99.99 0 00-1.38-.26c-.26.18-.4.49-.35.8z" />
                </svg>
              </span>
              <input type="text" name="facebook" value="{{ $profile->userSocial->facebook ?? '' }}" id="facebook" placeholder="Facebook" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <!-- Twitter Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 7.48 2 12c0 4.42 3.13 8.13 7.38 9.44.54.1.74-.23.74-.51v-1.84c-3.02.66-3.65-1.46-3.65-1.46-.49-1.26-1.2-1.6-1.2-1.6-.98-.67.08-.66.08-.66 1.08.08 1.65 1.11 1.65 1.11.95 1.67 2.48 1.19 3.09.91.09-.69.37-1.19.67-1.46-2.34-.27-4.81-1.17-4.81-5.21 0-1.15.41-2.09 1.08-2.83-.11-.27-.47-1.39.1-2.89 0 0 .88-.28 2.88 1.08a10.04 10.04 0 012.62-.35c.89 0 1.78.12 2.62.35 2-1.36 2.88-1.08 2.88-1.08.57 1.5.21 2.62.1 2.89.67.74 1.08 1.68 1.08 2.83 0 4.05-2.49 4.94-4.84 5.2.38.34.73 1.01.73 2.03v3.02c0 .28.2.62.74.51C20.87 20.13 24 16.42 24 12c0-4.52-4.48-9-12-9z" />
                </svg>
              </span>
              <input type="text" name="twitter" value="{{ $profile->userSocial->twitter ?? '' }}" id="twitter" placeholder="Twitter" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
      
            <!-- LinkedIn Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8a6 6 0 100-12 6 6 0 000 12zm-4 3a5 5 0 00-5 5v7h-4v-7a5 5 0 0110 0v7h-4v-7a5 5 0 00-5-5zm14 12v-5.5c0-3.58-1.92-5.5-5.02-5.5-2.63 0-3.8 1.61-4.46 2.73V16h-4v7h4v-5.17c0-1.18.45-2.83 1.88-2.83 1.42 0 1.94 1.28 1.94 2.94V23h4z" />
                </svg>
              </span>
              <input type="text" name="linkedin" value="{{ $profile->userSocial->linkedin ?? '' }}" id="linkedin" placeholder="LinkedIn" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
          </div>
        
          <div class="mt-4">
            <x-slot name="footer">
              <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
                  Cancel
              </button>
              <button type="submit" form="socialMediaForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
                  Add Social Media
              </button>
            </x-slot>
          </div>
        </form>
        
        
      </div>
  </div>
</x-mainModal>



{{-- Experience --}}
<x-mainModal id="experience">
  <div x-data class="py-4  max-w-xl mx-auto bg-white ">
    <x-slot name="header">
      <h2 class="text-lg font-semibold text-gray-900">Add Job Experience</h2>
    </x-slot>
    <div>
      <form action="{{ route('experience.store') }}" id="experienceForm" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-x-8">
          <div>
            <div class="mb-4">
              <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
              <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="companyLogo" class="block text-sm font-medium text-gray-700">Company Logo</label>
              <input type="file" id="companyLogo" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:bg-indigo-50 file:text-indigo-700 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold hover:file:bg-indigo-100">
            </div>
            <div class="mb-4">
              <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
              <input type="text" name="company" id="company" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
              <input type="text" name="type" id="employment_type" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
          </div>

          <div>
            <div class="mb-4">
              <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
              <input type="date" name="end_date" id="end_date" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
              <input type="text" name="location" id="location" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
              <textarea name="description" id="description" rows="3" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"></textarea>
            </div>
          </div>
        </div>
        <x-slot name="footer">
          <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
              Cancel
          </button>
          <button type="submit" form="experienceForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
              Add Experience
          </button>
        </x-slot>
      </form>
    </div>
  </div>
</x-mainModal>

{{-- Education --}}
<x-mainModal id="education">
  <div x-data class="py-4 max-w-xl mx-auto bg-white ">
    <x-slot name="header">
      <h2 class="text-lg font-semibold text-gray-900">Add Your Education</h2>
    </x-slot>
    <div>
      <form action="{{ route('education.store') }}" id="educationForm" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-x-8">
          <div>
            <div class="mb-4">
              <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
              <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="companyLogo" class="block text-sm font-medium text-gray-700">Logo</label>
              <input type="file" id="companyLogo" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:bg-indigo-50 file:text-indigo-700 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold hover:file:bg-indigo-100">
            </div>
          </div>

          <div>
            <div class="mb-4">
              <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
              <input type="text" name="location" id="location" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
              <textarea name="description" id="description" rows="3" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"></textarea>
            </div>
          </div>
        </div>
        <x-slot name="footer">
          <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
              Cancel
          </button>
          <button type="submit" form="educationForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
              Add Education
          </button>
        </x-slot>
      </form>
    </div>
  </div>
</x-mainModal>



{{-- Experience
<x-mainModal id="certificates">
  <div x-data class=" py-4">
      <div class="text-lg font-medium text-gray-900">
          Create New Certificate
      </div>

      <div class="mt-4">
          <form action="" method="POST">
              @csrf
              <div class="mb-4">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="mb-4">
                  <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>
              <div class="flex justify-end">
                  <button type="button" @click="isModalOpen = false" class="mr-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
                  <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
              </div>
          </form>
      </div>
  </div>
</x-mainModal> --}}

{{-- Project --}}
<x-mainModal id="project">
  <div x-data class=" py-4 max-w-lg mx-auto bg-white shadow-lg rounded-lg">
    <x-slot name="header">
      <h2 class="text-lg font-semibold text-gray-900">Create New Project</h2>
    </x-slot>
    <div>
      <form action="{{ route('project.store') }}" id="projectForm" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title Field -->
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
        </div>

        <!-- Image Field -->
        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
          <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500
              file:bg-indigo-50 file:text-indigo-700
              file:py-2 file:px-4 file:rounded-full
              file:border-0 file:font-semibold
              hover:file:bg-indigo-100">
        </div>

        <!-- Description Field -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea name="description" id="description" rows="4" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"></textarea>
        </div>

        <!-- Link Field -->
        <div class="mb-4">
          <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
          <input type="text" name="link" id="link" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
        </div>

        <!-- Buttons -->
        <x-slot name="footer">
          <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
              Cancel
          </button>
          <button type="submit" form="projectForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
              Add Project
          </button>
        </x-slot>
      </form>
    </div>
  </div>
</x-mainModal>
