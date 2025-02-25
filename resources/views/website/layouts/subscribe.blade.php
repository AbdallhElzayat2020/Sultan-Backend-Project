<section class="subscribe-section p_relative pl_60 pr_60">
    <div class="bg-shape p_absolute l_0 b_0"></div>
    <div class="outer-container p_relative bg_yellow pt_60 pb_60">
        <div class="pattern-layer p_absolute l_0 b_0 r_0"></div>
        <div class="large-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                    <div class="text">
                        <h2 class="d_block fs_30 lh_50 color_white fw_exbold" style="text-align: start">
                            اشترك ليصلك كل جديد
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner p_relative d_block ml_40 mt_8">
                        <form action="{{route('mails.store')}}" method="post">
                            @csrf
                            <div class="form-group p_relative d_block bg_white mr-0 p_13 b_radius_3 pr_100">
                                <input type="email" name="email" placeholder="البريد الالكتروني" required />
                                <button type="submit">
                                    <i class="fas fa-envelope-open"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
