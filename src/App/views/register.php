<?php include $this->resolve("partials/_header.php"); ?>

<section
    class="max-w-2xl mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <form method="POST" class="grid grid-cols-1 gap-6">
        <?php include $this->resolve("partials/_csrf.php"); ?>

        <!-- Email -->
        <label class="block">
            <span class="text-gray-700">Email</span>
            <input
                value="<?php echo e($oldFormData['email'] ?? ''); ?>"
                name="email"
                type="email"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="koto@exemple.com" />
            <?php if (array_key_exists('email', $errors)): ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['email'][0]); ?>
                </div>
            <?php endif; ?>
        </label>
        <!-- Age -->
        <label class="block">
            <span class="text-gray-700">Age</span>
            <input
                value="<?php echo e($oldFormData['age'] ?? ''); ?>"
                name="age"
                type="number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="" />
            <?php if (array_key_exists('age', $errors)): ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['age'][0]); ?>
                </div>
            <?php endif; ?>
        </label>
        <!-- Country -->
        <label class="block">
            <span class="text-gray-700">Country</span>
            <select name="country" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="USA">USA</option>
                <option value="Japon" <?php echo isset($oldFormData['country']) && $oldFormData['country'] === 'Japon' ? 'selected' : ''; ?>>Japon</option>
                <option value="Madagascar" <?php echo isset($oldFormData['country']) && $oldFormData['country'] === 'Madagascar' ? 'selected' : ''; ?>>Madagascar</option>
                <option value="Invalid">Invalid Country</option>
            </select>
            <?php if (array_key_exists('country', $errors)) : ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['country'][0]); ?>
                </div>
            <?php endif; ?>
        </label>
        <!-- Social Media URL -->
        <label class="block">
            <span class="text-gray-700">URL de médias sociaux</span>
            <input
                value="<?php echo e($oldFormData['socialMediaURL'] ?? ''); ?>"
                name="socialMediaURL"
                type="text"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="" />
            <?php if (array_key_exists('socialMediaURL', $errors)): ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['socialMediaURL'][0]); ?>
                </div>
            <?php endif; ?>
        </label>
        <!-- Password -->
        <label class="block">
            <span class="text-gray-700">Mot de passe</span>
            <input
                name="password"
                type="password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="" />
            <?php if (array_key_exists('password', $errors)): ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['password'][0]); ?>
                </div>
            <?php endif; ?>
        </label>
        <!-- Confirm Password -->
        <label class="block">
            <span class="text-gray-700">Confirmer le mot de passe </span>
            <input
                name="confirmPassword"
                type="password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="" />
            <?php if (array_key_exists('confirmPassword', $errors)): ?>
                <div class="bg-gray-100 mt-2 p-2 text-red-500">
                    <?php echo e($errors['confirmPassword'][0]); ?>
                </div>
            <?php endif; ?>
        </label>
        <!-- Terms of Service -->
        <div class="block">
            <div class="mt-2">
                <div>
                    <label class="inline-flex items-center">
                        <input
                            <?php echo $oldFormData['tos'] ?? false ? 'checked' : ''; ?>
                            name="tos"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                            type="checkbox" />
                        <span class="ml-2">J'accepte les conditions de service.</span>
                    </label>
                    <?php if (array_key_exists('tos', $errors)): ?>
                        <div class="bg-gray-100 mt-2 p-2 text-red-500">
                            <?php echo e($errors['tos'][0]); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button
            type="submit"
            class="block w-full py-2 bg-indigo-600 text-white rounded">
            Valider
        </button>
    </form>
</section>

<?php include $this->resolve("partials/_footer.php"); ?>