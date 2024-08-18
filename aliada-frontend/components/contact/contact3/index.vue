<template>
    <section class="small-section contact-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="log-in theme-card">
                        <div class="title-3 text-start">
                            <h2>Let's Get In Touch</h2>
                        </div>
                        <form class="row gx-3 get-in-touch">
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
                                    <input placeholder="phone number" class="form-control" name="mobnumber" id="tbNumbers"
                                        type="number" maxlength="9" required>
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
                    <div class="theme-card">
                        <div class="contact-bottom">
                            <div class="contact-map">
                                <iframe title="contact location"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <ContactContact3Details />
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
</script>

<style scoped></style>
