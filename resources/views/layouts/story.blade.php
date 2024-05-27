<div id="uploadStoryModal" class="story-modal">
    <div class="story-modal-content">
      <span class="story-modal-close">&times;</span>
      <form id="storyForm">
        <div class="story-form-group">
          <label for="fileUpload">Choose file:</label>
          <input type="file" id="fileUpload" name="fileUpload" accept="image/*,video/*" multiple>
        </div>
        <div class="story-form-group">
          <label for="caption">Caption:</label>
          <textarea id="caption" name="caption" rows="4" placeholder="Add a caption..."></textarea>
        </div>
        <button type="submit" class="story-modal-btn">Submit</button>
      </form>
    </div>
  </div>