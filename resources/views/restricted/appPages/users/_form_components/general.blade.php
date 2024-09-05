<form action="{{ route('app.dashboard.users.form') }}" method="POST" class="relative">
    @csrf
    <input type="hidden" value="{{ @$pageData->id }}" name="id">
    <div class="hidden items-center justify-center w-full h-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 absolute z-50" id="form-loading">
        <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="grid gap-2 mb-2 sm:grid-cols-2">
        <div class="col-span-2">
            <label for="status" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select id="status" name="status" data-placeholder="Choose a status" data-allow-clear="true" title="Choose a status" style="width: 100%" >
                <option></option>
                <option value="1" {{ (string) @$pageData->status === '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ (string) @$pageData->status === '0' ? 'selected' : '' }}>In-Active</option>
            </select>
        </div>
        <div>
            <label for="full-name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
            <input type="text" name="fullName" id="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ @$pageData->name }}" placeholder="John Doe">
        </div>
        <div>
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ @$pageData->email }}" placeholder="johndoe@gmail.com" required="">
        </div>
        <div class="sm:col-span-2">
            <label for="biography" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
            <textarea id="biography" rows="2" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write biography here..."></textarea>
        </div>
    </div>
    <div class="flex items-center space-x-2 border-t border-t-gray-300 dark:border-t-gray-700  py-2 justify-end mt-5">
        <a href="{{ route('app.dashboard.users.list') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-md text-sm p-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Cancel
        </a>
        <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 formSubmit">
            Submit
        </button>
    </div>
</form>
