<section class="section">
<div class="container">
  <form method="post" action="<?= base_url() ?>/publishers/updatepublisher">
		<input type="hidden" name="Publisherid" value="<?= $publisher['pId'] ?>">
		<input type="hidden" name="Slug" value="<?= $publisher['pSlug'] ?>">
    <!-- Name Entry -->
    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="Publisher Name" name="Name" value="<?= $publisher['pName']?>">
      </div>
    </div>
    <!--Website Address -->
    <div class="field">
      <label class="label">Website</label>
      <div class="control">
        <input class="input" type="text" placeholder="https://publisher.address" name="Website" <?php if ( isset ( $publisher['pWebsite'] )): ?>value="<?= $publisher['pWebsite'] ?>"<?php endif; ?>>
      </div>
    </div>
		<!--About -->
		<div class="field">
			<label class="label">About:</label>
			<div class="control">
				<textarea class="textarea" name="About"><?= $publisher['pAbout'] ?></textarea>
			</div>
		</div>
    <!-- File Chooser Entry -->
    <div class="field is-grouped">
      <!-- Button Send -->
      <p class="control">
        <button class="button is-primary" type="submit" name="submit">Update Publisher</button>
      </p>
      <!-- Button Clear -->
      <p class="control">
        <button class="button is-light" type="reset" name="clear">Clear</button>
      </p>
    </div>

  </form>
</div>
</section>
