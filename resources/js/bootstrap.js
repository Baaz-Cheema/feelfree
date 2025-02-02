import axios from 'axios';
import '../../vendor/masmerise/livewire-toaster/resources/js';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Tooltip from "@ryangjchandler/alpine-tooltip";

Alpine.plugin(Tooltip);

Livewire.start()

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
