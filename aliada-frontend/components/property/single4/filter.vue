<template>
    <div class="col-xl-3 col-lg-4">
        <div class="left-sidebar sticky-cls single-sidebar">
            <div class="filter-cards">
                <div class="advance-card">
                    <h6>Contact Info</h6>
                    <div class="category-property">
                        <div class="agent-info">
                            <div class="media">
                                <img src="/image/testimonial/3.png" class="img-50" alt="">
                                <div class="media-body ms-2">
                                    <h6>Jonathan Scott</h6>
                                    <p>Contact@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <Icon name="octicon:location" class="me-2"></Icon>A-32, Albany, Newyork.
                            </li>
                            <li>
                                <Icon name="material-symbols:call" class="me-2"></Icon>(+066) 518 - 457 - 5181
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="advance-card">
                    <h6>Request exploration</h6>
                    <div class="category-property">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input placeholder="phone number" class="form-control" name="mobnumber" id="tbNumbers"
                                    type="tel" maxlength="9" required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill">Submit
                                Request</button>
                        </form>
                    </div>
                </div>
                <PropertySingle1Filteroptions />
                <PropertySingle1Feature />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped></style>