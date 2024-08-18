<template>
   <section class="small-section get-in-touch">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 contact-img">
                    <img src="/image/inner-pages/1.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="log-in">
                        <div class="mb-4 text-start">
                            <h2>Let's Get In Touch</h2>
                        </div>
                        <form class="row gx-3">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <Icon name="material-symbols:person-2-outline" />
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your name" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <Icon name="ph:phone" />
                                        </div>
                                    </div>
                                    <input placeholder="phone number" class="form-control" name="mobnumber" id="tbNumbers" type="tel" maxlength="10" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <Icon name="material-symbols:mail-outline" />
                                        </div>
                                    </div>
                                    <input type="email" class="form-control" placeholder="email address" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">Write here something
                                </textarea>
                            </div>
                            <div class="col-md-12 submit-btn">
                                <button class="btn btn-gradient color-2 btn-pill" type="submit">Send Your Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </section>
   <section class="small-section contact_section pt-0 contact_bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6" v-for="(item , index) in alldata" :key="index">
                <div class="contact_wrap">
                    <Icon :name="item.icon" />
                    <h4>{{ item.title }}</h4>
                    <p class="font-roboto" v-if="item.phone">{{ item.add }} <br>
                        {{ item.add2 }} <br>
                       {{ item.phone }}
                    </p>
                    <ul v-if="item.phone2">
                        <li>Inquiries: {{ item.inq }}</li>
                        <li>Support: {{ item.supp }}</li>
                        <li>{{ item.phone2 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</template>
<script setup lang="ts">
import {useurl} from '~/composable/apiurl'
interface contact{
    icon:string,
    title:string,
    add?:string,
    add2?:string
    phone?:string,
    inq?:string,
    supp?:string,
    phone2?:string,
}
interface FetchResponse {
    data:{
        value: {
            address: contact[];
        };
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let {data} = await useFetch(useurl+'/data/contact.json')
let alldata:contact[] = data.value.address
</script>