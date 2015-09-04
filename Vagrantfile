Vagrant.configure(2) do |config|
    config.vm.box = "ubuntu/trusty32"
    config.vm.hostname = "local.notify"
    config.vm.network "private_network", ip: "192.168.33.20"

    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = 'puppet/manifests'
        puppet.module_path = 'puppet/modules'
        puppet.manifest_file = 'init.pp'
    end
end
