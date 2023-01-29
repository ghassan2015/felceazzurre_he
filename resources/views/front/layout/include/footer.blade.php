<footer>
    <div id="footer">
@php($setting=\App\Models\Setting::first())
        <ul class="link_social">
            <li>
                <a href="{{$setting->facebook_link}}" target="_blank" title="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.344 18.875" style="height:30px;"><path id="facebook" class="cls-1" d="M681.169,731.184a0.825,0.825,0,0,1,.887-0.907H684.3v-3.235l-3.1-.012c-3.436,0-4.218,2.413-4.218,3.956v2.157H675v3.331h1.988v9.43h4.18v-9.43h2.821l0.366-3.331h-3.187v-1.959Z" transform="translate(-675 -727.031)"/></svg>
                </a>
            </li>
            <li>
                <a href="{{$setting->instagram_link}}" target="_blank" title="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" style="height:30px;"><path id="Instagram" class="cls-1" d="M250,43.405c67.287,0,75.257.257,101.829,1.469C376.4,46,389.742,50.1,398.622,53.552A78.064,78.064,0,0,1,427.6,72.4a78.063,78.063,0,0,1,18.851,28.976c3.451,8.879,7.556,22.223,8.677,46.792,1.213,26.573,1.469,34.543,1.469,101.83s-0.256,75.257-1.469,101.829c-1.121,24.57-5.226,37.913-8.677,46.793a83.451,83.451,0,0,1-47.826,47.826c-8.88,3.451-22.223,7.556-46.793,8.677-26.568,1.212-34.538,1.469-101.829,1.469s-75.261-.257-101.829-1.469c-24.57-1.121-37.913-5.226-46.793-8.677A78.082,78.082,0,0,1,72.4,427.6a78.082,78.082,0,0,1-18.851-28.976C50.1,389.742,46,376.4,44.875,351.829,43.662,325.257,43.406,317.287,43.406,250s0.257-75.257,1.469-101.83C46,123.6,50.1,110.257,53.552,101.378A78.073,78.073,0,0,1,72.4,72.4a78.075,78.075,0,0,1,28.976-18.851C110.258,50.1,123.6,46,148.17,44.874c26.573-1.212,34.543-1.469,101.83-1.469M250-2c-68.439,0-77.021.29-103.9,1.516C119.278,0.74,100.96,5,84.93,11.23A123.526,123.526,0,0,0,40.3,40.3,123.526,123.526,0,0,0,11.23,84.93C5,100.96.74,119.278-.484,146.1-1.71,172.979-2,181.56-2,250s0.29,77.02,1.516,103.9C0.74,380.722,5,399.04,11.23,415.069A123.53,123.53,0,0,0,40.3,459.7,123.534,123.534,0,0,0,84.93,488.77c16.03,6.229,34.348,10.489,61.171,11.713C172.979,501.71,181.561,502,250,502s77.021-.289,103.9-1.516c26.823-1.224,45.141-5.484,61.171-11.713a128.857,128.857,0,0,0,73.7-73.7c6.23-16.029,10.49-34.347,11.714-61.17C501.71,327.02,502,318.439,502,250s-0.29-77.021-1.516-103.9C499.26,119.278,495,100.96,488.77,84.93A123.521,123.521,0,0,0,459.7,40.3,123.527,123.527,0,0,0,415.07,11.23C399.04,5,380.722.74,353.9-.484,327.021-1.71,318.439-2,250-2h0Zm0,122.594A129.406,129.406,0,1,0,379.405,250,129.405,129.405,0,0,0,250,120.594ZM250,334a84,84,0,1,1,84-84A84,84,0,0,1,250,334ZM414.758,115.482a30.24,30.24,0,1,1-30.24-30.24A30.24,30.24,0,0,1,414.758,115.482Z"/></svg>
                </a>
            </li>

        </ul>
        <p>
            <a href="https://www.paglieri.com" title="Paglieri" target="_blank">
                <img src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/blank.png" data-src="//felceazzurrait.cdn-immedia.net//sites/all/themes/felceazzurra/img/share/paglieri.png" alt="Paglieri" title="Paglieri" class="lazyload"/>
            </a>
        </p>


        <p>
            <span>{{$setting->website_name}}</span> - {{$setting->address}}<br />
            <br />
            <a href="mailto:{{$setting->contact_email}}" title="{{$setting->contact_email}}">{{$setting->contact_email}}</a></p>


        <p>
            © {{$setting->website_name}} 2022 All rights reserved <span class="nomobile2">-</span> <a href="https://www.paglieri.com/en/policy" target="_blank" title="Privacy Policy">Privacy Policy</a> <span class="nomobile2">-</span> <a href="/en/contacts" title="Contacts">Contacts</a> <span class="nomobile2">-</span> <a href="/en/cookie-policy" title="Cookie Policy">Cookie Policy</a> <span class="nomobile2">-</span> <a href="/en/legal-notes">Legal notes</a> <span class="nomobile2">-</span> <a href="https://www.immedia.net" title="Digital Agency IM*MEDIA" target="_blank" id="link_immedia">Credits</a>
        </p>

    </div>

</footer>

